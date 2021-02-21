@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">
        <h1>Edit Data Petugas</h1>
    </div>
</div>

<div class="row">
    <div class="col-6">
        {{--  --}}
        <form action="{{ route('petugas.update', $petugas->id_petugas) }}" method="POST">
            @method('patch')
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $petugas->username }}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" value="{{ $petugas->password }}">
            </div>
            <div class="form-group">
                <label for="nama_petugas">Nama Petugas</label>
                <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="{{ $petugas->nama_petugas }}">
            </div>
            <div class="form-group">
                <label for="level">Level Hak Akses</label>
                <select class="form-control" id="level" name="level">
                    <option disabled value>Pilih Level</option>
                    <option value="{{ $petugas->level }}"> &rarr; {{ $petugas->level }}</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
