@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">
        <h1>Daftar Siswa</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, magni.</p>
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

        <a href="{{ route('siswa.create') }}" class="btn btn-info">Insert +</a>
    </div>
</div>

<div class="row">
    <div class="col">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NISN</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Telp</th>
                    <th scope="col">SPP</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $item)    
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{!! $item->nisn !!}</td>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->kelas->nama_kelas }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->no_telp }}</td>
                    <td>{{ $item->spp->nominal }}</td>
                    <td>
                        <a href="{{ route('siswa.edit', $item->id_siswa) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('siswa.destroy', $item->id_siswa) }}" method="POST" class="d-inline">
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
