@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Products</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Products</li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">
            {{-- Action Buttons --}}
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('products.create') }}" class="btn btn-md btn-success">ADD PRODUCT</a>
                <a href="{{ route('products.pdf') }}" class="btn btn-md btn-danger">Cetak PDF Produk</a>
            </div>

            {{-- Table --}}
            <div class="table-responsive">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th class="text-center">IMAGE</th>
                            <th>TITLE</th>
                            <th>PRICE</th>
                            <th>STOCK</th>
                            <th class="text-center" style="width: 20%;">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td class="text-center align-middle">
                                    @php
                                        $imagePath = $product->image && file_exists(storage_path('app/public/products/' . basename($product->image)))
                                            ? asset('storage/products/' . basename($product->image))
                                            : asset('images/no-image.png');
                                    @endphp
                                    <img src="{{ $imagePath }}" alt="{{ $product->title }}" class="rounded" style="width: 150px; max-height: 100px; object-fit: contain;">
                                </td>
                                <td class="align-middle">{{ $product->title }}</td>
                                <td class="align-middle">{{ 'Rp ' . number_format($product->price, 2, ',', '.') }}</td>
                                <td class="align-middle">{{ $product->stock }}</td>
                                <td class="text-center align-middle">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    <div class="alert alert-danger mb-0">Data Products belum tersedia.</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('alertload')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "BERHASIL",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @elseif(session('error'))
        Swal.fire({
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @endif
</script>
@endsection
