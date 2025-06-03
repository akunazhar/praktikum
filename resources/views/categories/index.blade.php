@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Kategori</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Kategori</li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">

            {{-- Action Buttons --}}
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('categories.create') }}" class="btn btn-success">Tambah Kategori</a>
                <a href="{{ route('categories.pdf') }}" class="btn btn-danger">Cetak PDF Kategori</a>
            </div>

            {{-- Table --}}
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-dark">Lihat</a>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Data belum tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            {{ $categories->links() }}

        </div>
    </div>
</div>
@endsection
