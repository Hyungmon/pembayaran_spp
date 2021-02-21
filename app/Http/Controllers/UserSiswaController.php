<?php

namespace App\Http\Controllers;

use App\UserSiswa;
use Illuminate\Http\Request;

class UserSiswaController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserSiswa  $userSiswa
     * @return \Illuminate\Http\Response
     */
    public function show(UserSiswa $userSiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserSiswa  $userSiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(UserSiswa $userSiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserSiswa  $userSiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserSiswa $userSiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserSiswa  $userSiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSiswa $userSiswa)
    {
        //
    }
}
