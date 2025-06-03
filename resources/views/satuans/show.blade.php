@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Satuan</h1>

    <table class="table table-bordered">
        <tr><th>ID</th><td>{{ $satuan->id }}</td></tr>
        <tr><th>Nama</th><td>{{ $satuan->name }}</td></tr>
        <tr><th>Deskripsi</th><td>{{ $satuan->description }}</td></tr>
        <tr><th>Dibuat</th><td>{{ $satuan->created_at }}</td></tr>
    </table>

    <a href="{{ route('satuans.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
