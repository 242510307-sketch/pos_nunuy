@extends('layouts.app')

@section('title', 'Daftar Produk')

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
        .product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .search-input:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        }
    </style>

    <div class="container py-4">
        {{-- Header Section --}}
        <div class="card bg-gradient-blue text-white shadow-sm mb-4 rounded-4 border-0">
            <div class="card-body p-4 text-center text-md-start d-flex flex-column flex-md-row align-items-center justify-content-between">
                <div>
                    <h2 class="fw-bold mb-1">📦 Daftar Produk</h2>
                    <p class="mb-0 opacity-75">
                        Kelola katalog barang, stok, harga jual, dan harga beli dengan mudah.
                    </p>
                </div>
                
                {{-- Tombol Tambah Produk (Tanpa Pembungkus @can) --}}
                <div class="mt-3 mt-md-0">
                    <a href="{{ route('produk.create') }}" class="btn btn-light text-primary fw-bold px-4 py-2 rounded-pill shadow-sm">
                        ✨ Tambah Produk Baru
                    </a>
                </div>
            </div>
        </div>

        {{-- Main Table Card --}}
        <div class="card card-custom shadow-sm">
            <div class="card-body p-4">

                {{-- Search Bar Section --}}
                <form action="{{ route('produk.index') }}" method="GET" class="mb-4">
                    <div class="row g-2">
                        <div class="col-md-6 col-lg-4 ms-auto">
                            <div class="input-group">
                                <input type="text" name="search" value="{{ request('search') }}" 
                                       class="form-control search-input rounded-start-pill ps-3"
                                       placeholder="🔍 Cari nama produk...">
                                <button class="btn btn-gradient-blue rounded-end-pill px-4" type="submit">
                                    Cari
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                {{-- Product Data Table --}}
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col" class="text-center" style="width: 50px;">#</th>
                                <th scope="col" class="text-center" style="width: 80px;">Foto</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Penanggung Jawab</th>
                                <th scope="col">Harga Beli</th>
                                <th scope="col">Harga Jual</th>
                                <th scope="col" class="text-center">Stok</th>
                                <th scope="col" class="text-center" style="width: 180px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td class="text-center fw-semibold text-muted">
                                        {{ $products->firstItem() + $loop->index }}
                                    </td>
                                    <td class="text-center">
                                        @if($product->foto)
                                            <img src="{{ asset('storage/' . $product->foto) }}" 
                                                 alt="{{ $product->nama }}" 
                                                 class="product-img">
                                        @else
                                            <div class="product-img bg-light d-flex align-items-center justify-content-center text-muted fs-4 mx-auto">
                                                🛍️
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark">{{ $product->nama }}</span>
                                    </td>
                                    <td class="text-muted small">
                                        👤 {{ $product->user->name ?? 'Sistem' }}
                                    </td>
                                    <td class="text-muted">
                                        Rp {{ number_format($product->harga_beli, 0, ',', '.') }}
                                    </td>
                                    <td class="fw-semibold text-primary">
                                        Rp {{ number_format($product->harga_jual, 0, ',', '.') }}
                                    </td>
                                    <td class="text-center">
                                        @if($product->stok <= 5)
                                            <span class="badge bg-danger bg-opacity-10 text-danger border border-danger-subtle px-3 py-1 rounded-pill fw-bold">
                                                ⚠️ {{ $product->stok }}
                                            </span>
                                        @else
                                            <span class="badge bg-info bg-opacity-10 text-primary border border-primary-subtle px-3 py-1 rounded-pill fw-bold">
                                                📦 {{ $product->stok }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            {{-- Tombol Edit --}}
                                            <a href="{{ route('produk.edit', $product) }}" class="btn btn-sm btn-outline-warning rounded-pill px-3 fw-medium">
                                                ✏️ Edit
                                            </a>

                                            {{-- Tombol Hapus --}}
                                            <form action="{{ route('produk.destroy', $product) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-medium" 
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                                    🗑️ Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-muted text-center py-5">
                                        🛍️ Belum ada data produk yang tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination Links --}}
                <div class="mt-4 d-flex justify-content-end">
                    {{ $products->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection