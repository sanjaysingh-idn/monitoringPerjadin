<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pegawai.golongan', [
            'title'     => 'Daftar Golongan',
            'golongan'  => Golongan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = $request->validate([
            'nama_golongan'  => 'required',
            'keterangan'     => 'nullable',
        ]);

        Golongan::create($attr);
        return back()->with('message', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function show(Golongan $golongan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function edit(Golongan $golongan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Golongan $golongan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Golongan $golongan)
    {
        Golongan::destroy($golongan->id);

        return back()->with('message_delete', 'Data berhasil dihapus');
    }
}
