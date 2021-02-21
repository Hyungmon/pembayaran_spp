<?php

namespace App\Http\Controllers;

use App\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $petugas = Petugas::all();
        return view('petugas.index_petugas', compact('petugas'));
    }

    public function dashboard()
    {
        return view('layouts.petugas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('petugas.create_petugas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        $req->validate([
            'username' => 'required|max:25',
            'password' => 'required|max:32',
            'nama_petugas' => 'required|max:35',
            'level' => 'required'
        ]);

        $petugas = new Petugas();
        $petugas->username = $req->username;
        $petugas->password = $req->password;
        $petugas->nama_petugas = $req->nama_petugas;
        $petugas->level = $req->level;
        $petugas->save();

        // return $petugas;
        return redirect()->route('petugas')->with('status', 'Data Petugas Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Petugas $petugas)
    {
        //
        return view('petugas.edit_petugas', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Petugas $petugas)
    {
        //
        Petugas::where('id_petugas', $petugas->id_petugas)->update([
            'username' => $request->username,
            'password' => $request->password,
            'nama_petugas' => $request->nama_petugas,
            'level' => $request->level
        ]);

        return redirect()->route('petugas')->with('status', 'Data Petugas Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petugas $petugas)
    {
        //
        Petugas::destroy($petugas->id_petugas);

        return redirect()->route('petugas')->with('status', 'Data Petugas Berhasil Dihapus!');
    }
}
