@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Product</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/products">Product</a></li>
        <li class="breadcrumb-item active">View Detail Product</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header"></div>
        <div class="card-body">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="container mt-5 mb-5">
                        <div class="row">

                            <!-- Image Section -->
                            <div class="col-md-4">
                                <div class="card border-0 shadow-sm rounded">
                                    <div class="card-body">
                                        <img src="{{ asset('storage/products/' . basename($product->image)) }}" class="rounded" style="width: 100%">
                                    </div>
                                </div>
                            </div>

                            <!-- Detail Section -->
                            <div class="col-md-8">
                                <div class="card border-0 shadow-sm rounded">
                                    <div class="card-body">
                                        <h3>{{ $product->title }}</h3>
                                        <hr/>
                                        <p><strong>Harga:</strong> {{ 'Rp ' . number_format($product->price, 2, ',', '.') }}</p>
                                        <p><strong>Deskripsi:</strong></p>
                                        <div>{!! $product->description !!}</div>
                                        <hr/>
                                        <p><strong>Stock:</strong> {{ $product->stock }}</p>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- row -->
                    </div> <!-- container -->
                </div> <!-- card -->
            </div> <!-- col-md-12 -->
        </div> <!-- card-body -->
    </div> <!-- card -->
</div> <!-- container-fluid -->
@endsection

@section('alertload')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
