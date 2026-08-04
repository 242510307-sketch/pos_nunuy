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
        color: white;
        border: none;
        transition: .3s;
    }

    .btn-gradient-blue:hover {
        background: linear-gradient(135deg, #0a58ca 0%, #084298 100%);
        color: white;
        transform: translateY(-2px);
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
        box-shadow: 0 2px 6px rgba(0,0,0,.15);
    }

    .search-input:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 .25rem rgba(13,110,253,.15);
    }
</style>

<div class="container py-4">

    {{-- Header --}}
    <div class="card bg-gradient-blue text-white shadow-sm rounded-4 border-0 mb-4">
        <div class="card-body d-flex justify-content-between align-items-center flex-wrap p-4">

            <div>
                <h2 class="fw-bold mb-1">📦 Daftar Produk</h2>
                <p class="mb-0 opacity-75">
                    Kelola katalog barang, stok, harga jual, dan harga beli dengan mudah.
                </p>
            </div>

            <div class="mt-3 mt-md-0">
                <a href="{{ route('produk.create') }}"
                    class="btn btn-light rounded-pill px-4 fw-bold text-primary shadow-sm">
                    ✨ Tambah Produk Baru
                </a>
            </div>

        </div>
    </div>

    {{-- Card --}}
    <div class="card card-custom shadow-sm">
        <div class="card-body">

            {{-- Search --}}
            <form action="{{ route('produk.index') }}" method="GET" class="mb-4">
                <div class="row">
                    <div class="col-md-5 ms-auto">
                        <div class="input-group">
                            <input type="text"
                                name="search"
                                value="{{ request('search') }}"
                                class="form-control search-input rounded-start-pill"
                                placeholder="🔍 Cari nama produk...">

                            <button class="btn btn-gradient-blue rounded-end-pill px-4">
                                Cari
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-primary">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Foto</th>
                            <th>Nama Produk</th>
                            <th>Jenis</th>
                            <th>Users</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th class="text-center">Stok</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($products as $product)

                        <tr>

                            <td class="text-center">
                                {{ $products->firstItem() + $loop->index }}
                            </td>

                            <td class="text-center">

                                @if($product->foto)

                                    <img src="{{ asset('storage/'.$product->foto) }}"
                                        class="product-img">

                                @else

                                    <div class="product-img bg-light d-flex justify-content-center align-items-center">
                                        📦
                                    </div>

                                @endif

                            </td>

                            <td>
                                <strong>{{ $product->nama }}</strong>
                            </td>

                            {{-- Jenis --}}
                            <td>
                                {{ $product->jenis }}
                            </td>

                            {{-- User --}}
                            <td>
                                👤 {{ $product->user->name ?? '-' }}
                            </td>

                            {{-- Harga Beli --}}
                            <td>
                                Rp {{ number_format($product->harga_beli,0,',','.') }}
                            </td>

                            {{-- Harga Jual --}}
                            <td class="fw-bold text-primary">
                                Rp {{ number_format($product->harga_jual,0,',','.') }}
                            </td>

                            {{-- Stok --}}
                            <td class="text-center">

                                @if($product->stok <= 5)

                                    <span class="badge bg-danger">
                                        {{ $product->stok }}
                                    </span>

                                @else

                                    <span class="badge bg-success">
                                        {{ $product->stok }}
                                    </span>

                                @endif

                            </td>

                            {{-- Aksi --}}
                            <td class="text-center">
    <div class="d-flex justify-content-center gap-2">

        {{-- Tombol Edit --}}
        <a href="{{ route('produk.edit', $product) }}"
            class="btn btn-outline-warning rounded-pill px-4 py-2 d-flex flex-column align-items-center justify-content-center"
            style="width:80px; height:52px;">
            <span style="font-size:18px;">✏️</span>
            <small>Edit</small>
        </a>

        {{-- Tombol Hapus --}}
        <form action="{{ route('produk.destroy', $product) }}"
              method="POST">
            @csrf
            @method('DELETE')

            <button type="submit"
                onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"
                class="btn btn-outline-danger rounded-pill px-4 py-2 d-flex flex-column align-items-center justify-content-center"
                style="width:95px; height:52px;">
                <span style="font-size:18px;">🗑️</span>
                <small>Hapus</small>
            </button>
        </form>

    </div>
</td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="9" class="text-center py-5 text-muted">

                                Belum ada data produk.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-4 d-flex justify-content-end">
                {{ $products->links() }}
            </div>

        </div>
    </div>

</div>

@endsection