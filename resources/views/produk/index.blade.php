@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')

<style>
    .bg-gradient-blue {
        background: linear-gradient(135deg, #0d6efd 0%, #0dcaf0 100%);
    }

    .btn-gradient-blue {
        background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
        color: #fff;
        border: none;
        transition: all 0.2s ease;
    }

    .btn-gradient-blue:hover {
        background: linear-gradient(135deg, #0a58ca 0%, #084298 100%);
        color: #fff;
        transform: translateY(-1px);
    }

    .card-custom {
        border: none;
        border-radius: 16px;
        overflow: hidden;
    }

    .product-img {
        width: 55px;
        height: 55px;
        object-fit: cover;
        border-radius: 12px;
        border: 1px solid #e9ecef;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
    }

    .product-placeholder {
        width: 55px;
        height: 55px;
        border-radius: 12px;
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        color: #adb5bd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
    }

    .search-input {
        border-color: #dee2e6;
    }

    .search-input:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
    }

    .table thead th {
        white-space: nowrap;
        font-size: 0.85rem;
        padding: 14px 12px;
    }

    .table tbody td {
        padding: 14px 12px;
        vertical-align: middle;
    }

    .table tbody tr {
        transition: background-color 0.15s ease;
    }

    .table tbody tr:hover {
        background-color: #f8fbff;
    }

    .price-buy {
        color: #6c757d;
        font-weight: 500;
    }

    .price-sell {
        color: #0d6efd;
        font-weight: 700;
    }

    .badge-stock {
        min-width: 70px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .action-buttons {
        white-space: nowrap;
    }

    .page-title-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.18);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }
</style>

<div class="container-fluid py-4">

    {{-- =========================
        HEADER
    ========================== --}}
    <div class="card bg-gradient-blue text-white shadow-sm mb-4 rounded-4 border-0">

        <div class="card-body p-4">

            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">

                <div class="d-flex align-items-center gap-3">

                    <div class="page-title-icon">
                        <i class="bi bi-box-seam-fill"></i>
                    </div>

                    <div>
                        <h2 class="fw-bold mb-1">
                            Daftar Produk
                        </h2>

                        <p class="mb-0 opacity-75">
                            Kelola produk, stok, harga beli, dan harga jual.
                        </p>
                    </div>

                </div>

                <a
                    href="{{ route('produk.create') }}"
                    class="btn btn-light text-primary fw-bold px-4 py-2 rounded-pill shadow-sm"
                >
                    <i class="bi bi-plus-circle-fill me-1"></i>
                    Tambah Produk
                </a>

            </div>

        </div>
    </div>


    {{-- =========================
        TABLE CARD
    ========================== --}}
    <div class="card card-custom shadow-sm">

        <div class="card-body p-4">

            {{-- =========================
                SEARCH
            ========================== --}}
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

                <div>
                    <h5 class="fw-bold mb-1">
                        <i class="bi bi-list-ul text-primary me-1"></i>
                        Data Produk
                    </h5>

                    <small class="text-muted">
                        Daftar seluruh produk yang tersedia.
                    </small>
                </div>

                <form
                    action="{{ route('produk.index') }}"
                    method="GET"
                    class="d-flex"
                    style="max-width: 400px; width: 100%;"
                >

                    <div class="input-group">

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control search-input rounded-start-pill ps-3"
                            placeholder="Cari nama produk..."
                        >

                        <button
                            class="btn btn-gradient-blue rounded-end-pill px-4"
                            type="submit"
                        >
                            <i class="bi bi-search me-1"></i>
                            Cari
                        </button>

                    </div>

                </form>

            </div>


            {{-- =========================
                DATA PRODUK
            ========================== --}}
            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-primary">

                        <tr>

                            <th class="text-center" style="width: 50px;">
                                #
                            </th>

                            <th class="text-center" style="width: 80px;">
                                <i class="bi bi-image me-1"></i>
                                Foto
                            </th>

                            <th>
                                <i class="bi bi-box-seam me-1"></i>
                                Nama Produk
                            </th>

                            <th>
                                <i class="bi bi-tags me-1"></i>
                                Jenis
                            </th>

                            <th>
                                <i class="bi bi-person-badge me-1"></i>
                                Penanggung Jawab
                            </th>

                            <th>
                                <i class="bi bi-cash-coin me-1"></i>
                                Harga Beli
                            </th>

                            <th>
                                <i class="bi bi-currency-dollar me-1"></i>
                                Harga Jual
                            </th>

                            <th class="text-center">
                                <i class="bi bi-boxes me-1"></i>
                                Stok
                            </th>

                            <th class="text-center" style="width: 170px;">
                                <i class="bi bi-gear me-1"></i>
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse ($products as $product)

                            <tr>

                                {{-- NOMOR --}}
                                <td class="text-center fw-semibold text-muted">

                                    {{ $products->firstItem() + $loop->index }}

                                </td>


                                {{-- FOTO --}}
                                <td class="text-center">

                                    @if($product->foto)

                                        <img
                                            src="{{ asset('storage/' . $product->foto) }}"
                                            alt="{{ $product->nama }}"
                                            class="product-img"
                                        >

                                    @else

                                        <div class="product-placeholder mx-auto">

                                            <i class="bi bi-image"></i>

                                        </div>

                                    @endif

                                </td>


                                {{-- NAMA PRODUK --}}
                                <td>

                                    <div class="fw-bold text-dark">

                                        <i class="bi bi-box-seam text-primary me-1"></i>

                                        {{ $product->nama }}

                                    </div>

                                </td>


                                {{-- JENIS --}}
                                <td>

                                    <span class="badge bg-light text-dark border px-3 py-2">

                                        <i class="bi bi-tag-fill text-primary me-1"></i>

                                        {{ $product->jenis ?? '-' }}

                                    </span>

                                </td>


                                {{-- PENANGGUNG JAWAB --}}
                                <td>

                                    <span class="text-muted">

                                        <i class="bi bi-person-fill text-primary me-1"></i>

                                        {{ $product->user->name ?? 'Sistem' }}

                                    </span>

                                </td>


                                {{-- HARGA BELI --}}
                                <td>

                                    <span class="price-buy">

                                        Rp {{ number_format($product->harga_beli, 0, ',', '.') }}

                                    </span>

                                </td>


                                {{-- HARGA JUAL --}}
                                <td>

                                    <span class="price-sell">

                                        Rp {{ number_format($product->harga_jual, 0, ',', '.') }}

                                    </span>

                                </td>


                                {{-- STOK --}}
                                <td class="text-center">

                                    @if($product->stok <= 5)

                                        <span
                                            class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-2 rounded-pill badge-stock"
                                        >

                                            <i class="bi bi-exclamation-triangle-fill me-1"></i>

                                            {{ $product->stok }}

                                        </span>

                                    @else

                                        <span
                                            class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill badge-stock"
                                        >

                                            <i class="bi bi-boxes me-1"></i>

                                            {{ $product->stok }}

                                        </span>

                                    @endif

                                </td>


                                {{-- AKSI --}}
                                <td class="text-center action-buttons">

                                    <div class="d-flex justify-content-center gap-2">

                                        {{-- EDIT --}}
                                        <a
                                            href="{{ route('produk.edit', $product) }}"
                                            class="btn btn-sm btn-outline-warning rounded-pill px-3"
                                            title="Edit Produk"
                                        >

                                            <i class="bi bi-pencil-square"></i>

                                        </a>


                                        {{-- HAPUS --}}
                                        <form
                                            action="{{ route('produk.destroy', $product) }}"
                                            method="POST"
                                            class="d-inline"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger rounded-pill px-3"
                                                title="Hapus Produk"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"
                                            >

                                                <i class="bi bi-trash3-fill"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="9"
                                    class="text-center py-5"
                                >

                                    <i class="bi bi-box-seam fs-1 text-muted d-block mb-3"></i>

                                    <h5 class="fw-bold text-muted">
                                        Belum Ada Produk
                                    </h5>

                                    <p class="text-muted mb-3">
                                        Belum ada data produk yang tersedia.
                                    </p>

                                    <a
                                        href="{{ route('produk.create') }}"
                                        class="btn btn-primary rounded-pill px-4"
                                    >
                                        <i class="bi bi-plus-circle me-1"></i>
                                        Tambah Produk
                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- =========================
                PAGINATION
            ========================== --}}
            @if($products->hasPages())

                <div class="mt-4 d-flex justify-content-end">

                    {{ $products->links() }}

                </div>

            @endif

        </div>

    </div>

</div>

@endsection