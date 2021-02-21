<?php

namespace App\Http\Controllers;

use App\Pembayaran;
use App\Petugas;
use App\Siswa;
use App\Spp;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PembayaranController extends Controller
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
        $pembayaran = Pembayaran::with('petugas', 'siswa', 'spp')->get();
        // return $pembayaran;
        return view('pembayaran.index_pembayaran', compact('pembayaran'));
    }

    /**
     * Display pembayaran untuk siswa dan petugas.
     *
     * @return \Illuminate\Http\Response
     */
    public function petugas()
    {
        //
        $pembayaran = Pembayaran::with('petugas', 'siswa', 'spp')->get();
        // return $pembayaran;
        return view('pembayaran.petugas_pembayaran', compact('pembayaran'));
    }

    public function siswa()
    {
        //
        $pembayaran = Pembayaran::with('petugas', 'siswa', 'spp')->get();
        // return $pembayaran;
        return view('pembayaran.siswa_pembayaran', compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $petugas = Petugas::all();
        $siswa = Siswa::all();
        // $siswa = Siswa::with('spp')->get();
        $spp = Siswa::with('spp')->get();
        // $spp = Spp::all();

        // return $siswa;
        return view('pembayaran.create_pembayaran', compact('petugas', 'siswa', 'spp'));
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
            'id_petugas' => 'required',
            'nisn' => 'required',
            'tgl_bayar' => 'required',
            'bulan_dibayar' => 'required|max:8|string',
            'tahun_dibayar' => 'required|integer',
            'id_spp' => 'required',
            'jumlah_bayar' => 'required|integer'
        ]);

        $pembayaran = new Pembayaran();
        $pembayaran->id_petugas = $req->id_petugas;
        $pembayaran->nisn = $req->nisn;
        $pembayaran->tgl_bayar = $req->tgl_bayar;
        $pembayaran->bulan_dibayar = $req->bulan_dibayar;
        $pembayaran->tahun_dibayar = $req->tahun_dibayar;
        $pembayaran->id_spp = $req->id_spp;
        $pembayaran->jumlah_bayar = $req->jumlah_bayar;
        $pembayaran->save();

        // return $pembayaran;
        return redirect()->route('pembayaran')->with('status', 'Data Pembayaran Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
        $petugas = Petugas::all();
        $siswa = Siswa::all();
        $spp = Spp::all();
        $pembayaran = Pembayaran::with('petugas', 'siswa', 'spp')->find($pembayaran->id_pembayaran);
        return view('pembayaran.edit_pembayaran', compact('petugas', 'siswa', 'spp', 'pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Pembayaran $pembayaran)
    {
        //
        $pembayaran = Pembayaran::find($pembayaran->id_pembayaran);
        $pembayaran->id_petugas = $req->id_petugas;
        $pembayaran->nisn = $req->nisn;
        $pembayaran->tgl_bayar = $req->tgl_bayar;
        $pembayaran->bulan_dibayar = $req->bulan_dibayar;
        $pembayaran->tahun_dibayar = $req->tahun_dibayar;
        $pembayaran->id_spp = $req->id_spp;
        $pembayaran->jumlah_bayar = $req->jumlah_bayar;
        $pembayaran->save();

        // return $pembayaran;
        return redirect()->route('pembayaran')->with('status', 'Data Pembayaran Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
        Pembayaran::destroy($pembayaran->id_pembayaran);
        return redirect()->route('pembayaran')->with('status', 'Data Pembayaran Berhasil Dihapus!');
    }

    /**
     * PDF Reporting
     */
    public function laporan()
    {
        $pembayaran = Pembayaran::with('petugas', 'siswa')->get();
        return view('pembayaran.laporan_pembayaran', compact('pembayaran'));
    }

    public function downloadLaporan()
    {
        $pembayaran = Pembayaran::with('petugas', 'siswa')->get();
        $pdf = PDF::loadView('pembayaran.laporan_pembayaran', compact('pembayaran'));
        return $pdf->download('Laporan-Pembayaran.pdf');
    }
}
