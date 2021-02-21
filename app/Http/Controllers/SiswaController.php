<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Siswa;
use App\Spp;
use App\UserSiswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
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
        $siswa = Siswa::with('kelas', 'spp')->get();
        // return $siswa;
        return view('siswa.index', compact('siswa'));
    }

    public function dashboard()
    {
        return view('layouts.siswa');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('siswa.create_siswa', compact('kelas', 'spp'));
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
            'nisn' => 'required|size:10',
            'nis' => 'required|size:8',
            'nama' => 'required|max:35',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|max:13',
            'id_spp' => 'required'
        ]);

        $siswa = new Siswa();
        $siswa->nisn = $req->nisn;
        $siswa->nis = $req->nis;
        $siswa->nama = $req->nama;
        $siswa->id_kelas = $req->id_kelas;
        $siswa->alamat = $req->alamat;
        $siswa->no_telp = $req->no_telp;
        $siswa->id_spp = $req->id_spp;
        $siswa->save();

        // return $siswa;
        return redirect()->route('siswa')->with('status', 'Siswa Berhasil Ditambahkan!');
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
     * @param  int  $nisn
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
        $kelas = Kelas::all();
        $spp = Spp::all();
        $siswa = Siswa::with('kelas', 'spp')->find($siswa->id_siswa);
        return view('siswa.edit_siswa', compact('siswa', 'kelas', 'spp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
        Siswa::where('id_siswa', $siswa->id_siswa)->update([
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_spp' => $request->id_spp
        ]);

        return redirect()->route('siswa')->with('status', 'Data Siswa Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        //
        Siswa::destroy($siswa->id_siswa);

        return redirect()->route('siswa')->with('status', 'Data Siswa Berhasil Dihapus!');
    }
}
