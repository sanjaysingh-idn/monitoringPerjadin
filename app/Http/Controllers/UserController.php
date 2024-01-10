<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jabatan;
use App\Models\Golongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $role = ['admin', 'pegawai'];

        return view('admin.pegawai.index', [
            'title'     => 'Daftar Pegawai',
            'users'     => User::all(),
            'role'      => $role,
            'jabatan'   => Jabatan::all(),
            'golongan'  => Golongan::all()
        ]);
    }

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
        // dd($request);
        $attr = $request->validate([
            'name'          => 'required|max:255',
            'email'         => 'required|email:dns|max:150',
            'role'          => 'required',
            'jabatan'       => 'required',
            'golongan'      => 'required',
            'kontak'        => 'required',
            'password'      => 'required|string|min:8|max:255',
        ]);

        $attr['password'] = Hash::make($request->password);

        User::create($attr);

        return back()->with('message', 'Pegawai berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return back()->with('message_delete', 'Data berhasil dihapus');
    }
}
