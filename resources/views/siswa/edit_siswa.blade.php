@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">
        <h1>Edit Data Siswa</h1>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <form action="{{ route('siswa.update', $siswa->id_siswa) }}" method="POST">
            @method('patch')
            @csrf
            <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" value="{{ $siswa->nisn }}">
                @error('nisn')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nis">NIS</label>
                <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" value="{{ $siswa->nis }}">
                @error('nis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $siswa->nama }}">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="id_kelas">Kelas</label>
                <select class="form-control @error('id_kelas') is-invalid @enderror" id="id_kelas" name="id_kelas">
                    <option disabled value>Pilih Kelas</option>
                    <option value="{{ $siswa->id_kelas }}"> &rarr; {{ $siswa->kelas->nama_kelas }}</option>
                    @foreach ($kelas as $kelas)
                    <option value="{{ $kelas->id_kelas }}">{{ $kelas->nama_kelas }}</option>
                    @endforeach
                </select>
                @error('id_kelas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ $siswa->alamat }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="no_telp">No Telp</label>
                <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ $siswa->no_telp }}">
                @error('no_telp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="id_spp">SPP</label>
                <select class="form-control @error('id_spp') is-invalid @enderror" id="id_spp" name="id_spp">
                    <option disabled value>Pilih Nominal SPP</option>
                    <option value="{{ $siswa->id_spp }}"> &rarr; {{ $siswa->spp->nominal }}</option>
                    @foreach ($spp as $spp)
                    <option value="{{ $spp->id_spp }}">{{ $spp->nominal }}</option>
                    @endforeach
                </select>
                @error('id_spp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>
    </div>
</div>
@endsection


