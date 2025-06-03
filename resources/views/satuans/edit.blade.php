@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Satuan</h1>

    <form action="{{ route('satuans.update', $satuan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $satuan->name) }}">
            @error('name') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                      rows="3">{{ old('description', $satuan->description) }}</textarea>
            @error('description') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('satuans.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
