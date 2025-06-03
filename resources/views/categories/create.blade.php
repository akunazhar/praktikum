@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Kategori</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Kategori</a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Nama Kategori</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                    @error('name') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
