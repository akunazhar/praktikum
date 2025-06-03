@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Satuan</h1>

    <form action="{{ route('satuans.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}">
            @error('name') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                rows="3">{{ old('description') }}</textarea>
            @error('description') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('satuans.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
