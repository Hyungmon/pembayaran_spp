@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">
        <h1>Data Transaksi Pembayaran</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, accusamus!</p>
    </div>
</div>

<div class="row mb-3">
    <div class="col">
        {{-- Feedback Success --}}
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <a href="{{ route('pembayaran.create') }}" class="btn btn-info">Insert +</a>
        <a href="{{ route('pembayaran.download') }}" class="btn btn-info float-right">Download PDF</a>
    </div>
</div>

<div class="row">
    <div class="col">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Petugas</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Tanggal Bayar</th>
                    <th scope="col">Bulan</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">SPP</th>
                    <th scope="col">Jumlah Bayar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembayaran as $item)    
                
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->petugas->nama_petugas }}</td>
                    <td>{{ $item->siswa->nama }}</td>
                    <td>{{ $item->tgl_bayar }}</td>
                    <td>{{ $item->bulan_dibayar }}</td>
                    <td>{{ $item->tahun_dibayar }}</td>
                    <td>{{ $item->siswa->spp->nominal }}</td>
                    <td>{{ $item->jumlah_bayar }}</td>
                    <td>
                        <a href="{{ route('pembayaran.edit', $item->id_pembayaran) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pembayaran.destroy', $item->id_pembayaran) }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Data Akan Dihapus Permanen')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
