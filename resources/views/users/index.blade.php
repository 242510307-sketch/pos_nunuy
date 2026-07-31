@extends('layouts.app')

@section('title', 'Kelola Users')

@section('content')
    @include('layouts.navbar')

    <style>
        .bg-gradient-blue {
            background: linear-gradient(135deg, #0d6efd 0%, #0dcaf0 100%);
        }
        .btn-gradient-blue {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            color: #fff;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-gradient-blue:hover {
            background: linear-gradient(135deg, #0a58ca 0%, #084298 100%);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(13, 110, 253, 0.3);
        }
        .card-custom {
            border: none;
            border-radius: 16px;
        }
        .search-input:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        }
        .avatar-circle {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background-color: #e7f1ff;
            color: #0d6efd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
    </style>

    <div class="container py-4">
        {{-- Header Section --}}
        <div class="card bg-gradient-blue text-white shadow-sm mb-4 rounded-4 border-0">
            <div class="card-body p-4 text-center text-md-start d-flex flex-column flex-md-row align-items-center justify-content-between">
                <div>
                    <h2 class="fw-bold mb-1">👥 Kelola Pengguna</h2>
                    <p class="mb-0 opacity-75">
                        Kelola data akun pengguna, pendaftaran, dan hak akses sistem.
                    </p>
                </div>
                <div class="mt-3 mt-md-0">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-light text-primary fw-bold px-4 py-2 rounded-pill shadow-sm">
                        ➕ Tambah User Baru
                    </a>
                </div>
            </div>
        </div>

        {{-- Main Table Card --}}
        <div class="card card-custom shadow-sm">
            <div class="card-body p-4">
                
                {{-- Search Bar Section --}}
                <form action="{{ route('admin.users') }}" method="GET" class="mb-4">
                    <div class="row g-2">
                        <div class="col-md-6 col-lg-4 ms-auto">
                            <div class="input-group">
                                <input type="text" name="search" value="{{ request('search') }}" 
                                       class="form-control search-input rounded-start-pill ps-3"
                                       placeholder="🔍 Cari username atau email...">
                                <button class="btn btn-gradient-blue rounded-end-pill px-4" type="submit">
                                    Cari
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                {{-- User Data Table --}}
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col" class="text-center" style="width: 50px;">#</th>
                                <th scope="col">Nama Pengguna</th>
                                <th scope="col">Email</th>
                                <th scope="col" class="text-center">Role / Peran</th>
                                <th scope="col" class="text-center" style="width: 200px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td class="text-center fw-semibold text-muted">
                                        {{ $users->firstItem() + $loop->index }}
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-circle">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>
                                            <span class="fw-bold text-dark">{{ $user->name }}</span>
                                        </div>
                                    </td>
                                    <td class="text-muted">
                                        📧 {{ $user->email }}
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-info bg-opacity-10 text-primary border border-primary-subtle px-3 py-2 rounded-pill fw-semibold">
                                            👤 {{ $user->role->name }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-outline-warning rounded-pill px-3 fw-medium">
                                                ✏️ Edit
                                            </a>
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-medium" onclick="return confirm('Yakin hapus user ini?')">
                                                    🗑️ Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-muted text-center py-5">
                                        🧩 Data pengguna tidak ditemukan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination Links --}}
                <div class="mt-4 d-flex justify-content-end">
                    {{ $users->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection