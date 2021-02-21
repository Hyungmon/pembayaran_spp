@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">
        <h1>Insert Data Kelas</h1>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <form action="{{ route('kelas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_kelas">Nama Kelas</label>
                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                <input type="text" class="form-control" id="kompetensi_keahlian" name="kompetensi_keahlian" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
