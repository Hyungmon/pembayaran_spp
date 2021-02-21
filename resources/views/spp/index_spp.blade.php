@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">
        <h1>Daftar SPP</h1>
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

        <a href="{{ route('spp.create') }}" class="btn btn-info">Insert +</a>
    </div>
</div>

<div class="row">
    <div class="col">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($spp as $spp)    
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $spp->tahun }}</td>
                    <td>{{ $spp->nominal }}</td>
                    <td>
                        <a href="{{ route('spp.edit', $spp->id_spp) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('spp.destroy', $spp->id_spp) }}" method="POST" class="d-inline">
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
