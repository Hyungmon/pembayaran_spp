@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">
        <h1>Insert Data SPP</h1>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <form action="{{ route('spp.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun">
                @error('tahun')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nominal">Nominal</label>
                <input type="text" class="form-control @error('nominal') is-invalid @enderror" id="nominal" name="nominal">
                @error('nominal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
