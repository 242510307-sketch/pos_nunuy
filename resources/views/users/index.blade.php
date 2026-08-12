@extends('layouts.app')

@section('title', 'Kelola Users')

@section('content')

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


<div class="container-fluid py-4">

    {{-- =========================
        HEADER
    ========================== --}}
    <div class="card bg-gradient-blue text-white shadow-sm mb-4 rounded-4 border-0">

        <div class="card-body p-4">

            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">

                <div>
                    <h2 class="fw-bold mb-1">
                        <i class="bi bi-people-fill me-2"></i>
                        Kelola Pengguna
                    </h2>

                    <p class="mb-0 opacity-75">
                        <i class="bi bi-shield-check me-1"></i>
                        Kelola data akun pengguna, pendaftaran, dan hak akses sistem.
                    </p>
                </div>

                <div class="mt-3 mt-md-0">

                    <a
                        href="{{ route('admin.users.create') }}"
                        class="btn btn-light text-primary fw-bold px-4 py-2 rounded-pill shadow-sm"
                    >
                        <i class="bi bi-person-plus-fill me-1"></i>
                        Tambah User Baru
                    </a>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================
        TABLE USERS
    ========================== --}}
    <div class="card card-custom shadow-sm">

        <div class="card-body p-4">

            {{-- =========================
                SEARCH
            ========================== --}}
            <form
                action="{{ route('admin.users') }}"
                method="GET"
                class="mb-4"
            >

                <div class="row g-2">

                    <div class="col-md-6 col-lg-4 ms-auto">

                        <div class="input-group">

                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                class="form-control search-input rounded-start-pill ps-3"
                                placeholder="Cari username atau email..."
                            >

                            <button
                                class="btn btn-gradient-blue rounded-end-pill px-4"
                                type="submit"
                            >
                                <i class="bi bi-search me-1"></i>
                                Cari
                            </button>

                        </div>

                    </div>

                </div>

            </form>


            {{-- =========================
                DATA USERS
            ========================== --}}
            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-primary">

                        <tr>

                            <th
                                scope="col"
                                class="text-center"
                                style="width: 50px;"
                            >
                                #
                            </th>

                            <th scope="col">
                                <i class="bi bi-person me-1"></i>
                                Nama Pengguna
                            </th>

                            <th scope="col">
                                <i class="bi bi-envelope me-1"></i>
                                Email
                            </th>

                            <th
                                scope="col"
                                class="text-center"
                            >
                                <i class="bi bi-shield-lock me-1"></i>
                                Role / Peran
                            </th>

                            <th
                                scope="col"
                                class="text-center"
                                style="width: 200px;"
                            >
                                <i class="bi bi-gear me-1"></i>
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse ($users as $user)

                            <tr>

                                {{-- NOMOR --}}
                                <td class="text-center fw-semibold text-muted">

                                    {{ $users->firstItem() + $loop->index }}

                                </td>


                                {{-- NAMA --}}
                                <td>

                                    <div class="d-flex align-items-center gap-2">

                                        <div class="avatar-circle">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>

                                        <span class="fw-bold text-dark">
                                            {{ $user->name }}
                                        </span>

                                    </div>

                                </td>


                                {{-- EMAIL --}}
                                <td class="text-muted">

                                    <i class="bi bi-envelope-fill text-primary me-1"></i>

                                    {{ $user->email }}

                                </td>


                                {{-- ROLE --}}
                                <td class="text-center">

                                    <span
                                        class="badge bg-info bg-opacity-10 text-primary border border-primary-subtle px-3 py-2 rounded-pill fw-semibold"
                                    >

                                        <i class="bi bi-person-badge-fill me-1"></i>

                                        {{ $user->role->name }}

                                    </span>

                                </td>


                                {{-- AKSI --}}
                                <td class="text-center">

                                    <div class="d-flex justify-content-center gap-2">

                                        {{-- EDIT --}}
                                        <a
                                            href="{{ route('admin.users.edit', $user->id) }}"
                                            class="btn btn-sm btn-outline-warning rounded-pill px-3 fw-medium"
                                        >
                                            <i class="bi bi-pencil-square me-1"></i>
                                            Edit
                                        </a>


                                        {{-- HAPUS --}}
                                        <form
                                            action="{{ route('admin.users.destroy', $user) }}"
                                            method="POST"
                                            class="d-inline"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-medium"
                                                onclick="return confirm('Yakin hapus user ini?')"
                                            >
                                                <i class="bi bi-trash3-fill me-1"></i>
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="5"
                                    class="text-muted text-center py-5"
                                >

                                    <i class="bi bi-person-x-fill fs-2 d-block mb-2"></i>

                                    Data pengguna tidak ditemukan.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- =========================
                PAGINATION
            ========================== --}}
            <div class="mt-4 d-flex justify-content-end">

                {{ $users->links() }}

            </div>

        </div>

    </div>

</div>

@endsection