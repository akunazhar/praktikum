@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Customer</h1>

    {{-- Alert --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Action Buttons --}}
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('customers.create') }}" class="btn btn-success">Tambah Customer</a>
        <a href="{{ route('customers.pdf') }}" class="btn btn-danger">Cetak PDF Customer</a>
    </div>

    {{-- Table --}}
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Telp</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->nik }}</td>
                        <td>{{ $customer->nama }}</td>
                        <td>{{ $customer->telp }}</td>
                        <td>
                            <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-dark btn-sm">Lihat</a>
                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Data tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $customers->links() }}
    </div>
</div>
@endsection
