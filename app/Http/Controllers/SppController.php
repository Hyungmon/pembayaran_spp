<?php

namespace App\Http\Controllers;

use App\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
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
        $spp = Spp::all();
        return view('spp.index_spp', compact('spp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('spp.create_spp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'tahun' => 'required|max:11',
            'nominal' => 'required|max:11',
        ]);

        $spp = new Spp();
        $spp->tahun = $request->tahun;
        $spp->nominal = $request->nominal;
        $spp->save();

        // return $spp;
        return redirect()->route('spp')->with('status', 'Data SPP Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function show(Spp $spp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function edit(Spp $spp)
    {
        //
        return view('spp.edit_spp', compact('spp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spp $spp)
    {
        //
        Spp::where('id_spp', $spp->id_spp)->update([
            'tahun' => $request->tahun,
            'tahun' => $request->tahun
        ]);

        return redirect()->route('spp')->with('status', 'Data SPP Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spp $spp)
    {
        //
        Spp::destroy($spp->id_spp);
        return redirect()->route('spp')->with('status', 'Data SPP Berhasil Dihapus!');
    }
}
