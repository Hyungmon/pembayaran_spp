@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">
        <h1>Daftar Petugas</h1>
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

        <a href="{{ route('petugas.create') }}" class="btn btn-info">Insert +</a>
    </div>
</div>

<div class="row">
    <div class="col">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Nama Petugas</th>
                    <th scope="col">Level</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($petugas as $ptgs)    
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $ptgs->username }}</td>
                    <td>{{ $ptgs->password }}</td>
                    <td>{{ $ptgs->nama_petugas }}</td>
                    <td>{{ $ptgs->level }}</td>
                    <td>
                        <a href="{{ route('petugas.edit', $ptgs->id_petugas) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('petugas.destroy', $ptgs->id_petugas) }}" method="POST" class="d-inline">
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
