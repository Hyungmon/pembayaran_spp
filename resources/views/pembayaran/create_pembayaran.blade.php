@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">
        <h1>Insert Data Pembayaran SPP</h1>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <form action="{{ route('pembayaran.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id_petugas">Petugas</label>
                <select class="form-control @error('id_petugas') is-invalid @enderror" id="id_petugas" name="id_petugas">
                    <option disabled value>Pilih Petugas</option>
                    @foreach ($petugas as $petugas)
                    <option value="{{ $petugas->id_petugas }}">{{ $petugas->nama_petugas }}</option>
                    @endforeach
                </select>
                @error('id_petugas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nisn">Nama Siswa</label>
                <select class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn">
                    <option disabled value>Pilih Siswa</option>
                    @foreach ($siswa as $siswa)
                    <option value="{{ $siswa->nisn }}">{{ $siswa->nama }}</option>
                    @endforeach
                </select>
                @error('nisn')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="tgl_bayar">Tanggal Bayar</label>
                <input type="date" class="form-control @error('tgl_bayar') is-invalid @enderror" id="tgl_bayar" name="tgl_bayar">
                @error('tgl_bayar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="bulan_dibayar">Bulan</label>
                <input type="text" class="form-control @error('bulan_dibayar') is-invalid @enderror" id="bulan_dibayar" name="bulan_dibayar">
                @error('bulan_dibayar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tahun_dibayar">Tahun</label>
                <input type="number" class="form-control @error('tahun_dibayar') is-invalid @enderror" id="tahun_dibayar" name="tahun_dibayar">
                @error('tahun_dibayar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="id_spp">SPP</label>
                <select class="form-control @error('id_spp') is-invalid @enderror" id="id_spp" name="id_spp">
                    <option disabled value>Pilih Nominal SPP</option>
                    @foreach ($spp as $spp)
                    <option value="{{ $spp->id_spp }}">{{ $spp->spp->nominal }}</option>
                    @endforeach
                </select>
                @error('id_spp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jumlah_bayar">Jumlah Bayar</label>
                <input type="number" class="form-control @error('jumlah_bayar') is-invalid @enderror" id="jumlah_bayar" name="jumlah_bayar">
                @error('jumlah_bayar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>
    </div>
</div>
@endsection


