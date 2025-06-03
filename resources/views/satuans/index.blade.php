@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Satuan</h1>
    <a href="{{ route('satuans.create') }}" class="btn btn-success mb-3">Tambah Satuan</a>

    <table class="table table-bordered">
        <thead>
            <tr><th>ID</th><th>Nama</th><th>Deskripsi</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            @forelse ($satuans as $satuan)
                <tr>
                    <td>{{ $satuan->id }}</td>
                    <td>{{ $satuan->name }}</td>
                    <td>{{ $satuan->description }}</td>
                    <td>
                        <a href="{{ route('satuans.show', $satuan->id) }}" class="btn btn-dark btn-sm">Lihat</a>
                        <a href="{{ route('satuans.edit', $satuan->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('satuans.destroy', $satuan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">Data tidak ditemukan</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $satuans->links() }}
</div>
@endsection
