@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Customer</h1>

    <table class="table table-bordered">
        <tr><th>ID</th><td>{{ $customer->id }}</td></tr>
        <tr><th>NIK</th><td>{{ $customer->nik }}</td></tr>
        <tr><th>Nama</th><td>{{ $customer->nama }}</td></tr>
        <tr><th>Telepon</th><td>{{ $customer->telp }}</td></tr>
        <tr><th>Email</th><td>{{ $customer->email }}</td></tr>
        <tr><th>Alamat</th><td>{{ $customer->alamat }}</td></tr>
    </table>

    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
