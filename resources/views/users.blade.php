@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Users</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <div class="float-end">
                <a href="{{ route('printuser') }}" class="btn btn-md btn-warning mb-3">PRINT USER</a>
                <a href="{{ route('exportuser') }}" class="btn btn-md btn-danger mb-3">Export USER</a>
            </div>
        </div>
        <div class="card-body">
            <!-- Tabel user atau konten lainnya -->
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-users me-1"></i> User List</span>
            <a href="{{ route('printuser') }}" class="btn btn-md btn-warning">PRINT USER</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered data-table">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">There are no users.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
