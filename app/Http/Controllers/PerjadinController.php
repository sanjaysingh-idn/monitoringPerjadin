<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Perjadin;
use Illuminate\Http\Request;

class PerjadinController extends Controller
{
    public function index()
    {
        return view('admin.perjadin.daftar', [
            'title'     => 'Daftar Perjalanan Dinas',
            'perjadin'  => Perjadin::all(),
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
}
