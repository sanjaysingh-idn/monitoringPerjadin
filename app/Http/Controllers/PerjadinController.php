<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bukti;
use App\Models\Perjadin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerjadinController extends Controller
{
    public function index()
    {
        return view('admin.perjadin.daftar', [
            'title'     => 'Daftar Perjalanan Dinas',
            'perjadin'  => Perjadin::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.perjadin.input', [
            'title'     => 'Input Perjalanan Dinas',
            'user'      => User::all(),
        ]);
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'user_id'       => 'required',
            'tujuan'        => 'required',
            'dalam_rangka'  => 'required',
            'tgl_berangkat' => 'required',
            'tgl_kembali'   => 'required',
            'biaya'         => 'required',
        ]);

        Perjadin::create($attr);

        session()->flash('alert', 'Data berhasil ditambah');
        return back();
    }

    public function show(Perjadin $perjadin)
    {
        //
    }

    public function edit(Perjadin $perjadin)
    {
        //
    }

    public function update(Request $request, Perjadin $perjadin)
    {
        //
    }

    public function destroy(Perjadin $perjadin)
    {
        Perjadin::destroy($perjadin->id);

        return back()->with('message_delete', 'Data berhasil dihapus');
    }

    public function laporanPerjadin()
    {
        return view('admin.laporan.index', [
            'title'     => 'Laporan Perjalanan Dinas',
        ]);
    }

    public function generateReport(Request $request)
    {
        $request->validate([
            'bulan' => 'required',
        ]);

        $getBulan = $request->input('bulan');

        list($year, $month) = explode('-', $request->input('bulan'));

        $perjadinData = Perjadin::whereYear('tgl_berangkat', $year)
            ->whereMonth('tgl_berangkat', $month)
            ->whereYear('tgl_kembali', $year)
            ->whereMonth('tgl_kembali', $month)
            ->get();

        return view('admin.laporan.generateReport', [
            'title'     => 'Laporan Perjadin',
            'data'      => $perjadinData,
            'getBulan'  => $getBulan
        ]);
    }

    public function buktiPerjadin($id)
    {
        return view('admin.perjadin.bukti', [
            'title'     => 'Upload Bukti Perjalanan Dinas',
            'user'      => User::all(),
            'bukti'     => Bukti::where('perjadin_id', $id)->get(),
        ]);
    }

    public function storeBukti(Request $request)
    {
        // Validate the incoming request data
        // ddd($request);
        $validatedData = $request->validate([
            'perjadin_id' => 'required',
            'nama_bukti' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        // Handle file upload
        $fotoPath = $request->file('foto')->store('bukti_foto'); // Store the uploaded file in the specified directory

        // Create a new Bukti instance with the validated data
        $bukti = new Bukti();
        $bukti->perjadin_id = $validatedData['perjadin_id'];
        $bukti->nama_bukti = $validatedData['nama_bukti'];
        $bukti->foto = $fotoPath; // Store the file path in the database
        $bukti->keterangan = $validatedData['keterangan'];
        $bukti->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Bukti Perjadin berhasil disimpan.');
    }

    public function destroyBukti($id)
    {
        $bukti = Bukti::find($id);

        if (!empty($bukti->foto)) {
            Storage::delete($bukti->foto);
        }

        $bukti->delete();
        return redirect()->back()->with('success', 'Bukti Perjadin berhasil dihapu.');
    }
}
