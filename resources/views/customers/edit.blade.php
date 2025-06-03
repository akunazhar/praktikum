@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Customer</h1>

    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                   value="{{ old('nik', $customer->nik) }}">
            @error('nik') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                   value="{{ old('nama', $customer->nama) }}">
            @error('name') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telp" class="form-control @error('telp') is-invalid @enderror"
                   value="{{ old('telp', $customer->telp) }}">
            @error('telp') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email', $customer->email) }}">
            @error('email') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                      rows="3">{{ old('alamat', $customer->alamat) }}</textarea>
            @error('alamat') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
