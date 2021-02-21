@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">
        <h1>Daftar Kelas</h1>
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

        <a href="{{ route('kelas.create') }}" class="btn btn-info">Insert +</a>
    </div>
</div>

<div class="row">
    <div class="col">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kelas</th>
                    <th scope="col">Kompetensi Keahlian</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $k)    
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $k->nama_kelas }}</td>
                    <td>{{ $k->kompetensi_keahlian }}</td>
                    <td>
                        <a href="{{ route('kelas.edit', $k->id_kelas) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('kelas.destroy', $k->id_kelas) }}" method="POST" class="d-inline">
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
