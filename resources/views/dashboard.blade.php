@extends('layouts.app')

@section('title', 'Dashboard Ringkasan')

@section('content')

<style>
    .bg-gradient-blue {
        background: linear-gradient(135deg, #0d6efd 0%, #0dcaf0 100%);
    }

    .card-custom {
        border: none;
        border-radius: 16px;
        transition: all 0.2s ease;
    }

    .card-custom:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(13, 110, 253, 0.15) !important;
    }

    .icon-box {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
    }

    .dashboard-title {
        font-weight: 700;
    }

    .table thead th {
        white-space: nowrap;
    }

    .stat-value {
        font-size: 1.25rem;
        font-weight: 700;
    }
</style>


<div class="container-fluid py-4">

    {{-- =========================
        HEADER DASHBOARD
    ========================== --}}
    <div class="card bg-gradient-blue text-white shadow-sm mb-4 rounded-4 border-0">
        <div class="card-body p-4">

            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">

                <div>
                    <h2 class="dashboard-title mb-2">
                        <i class="bi bi-speedometer2 me-2"></i>
                        Ringkasan Hari Ini
                    </h2>

                    <p class="mb-0 opacity-75">
                        <i class="bi bi-calendar3 me-2"></i>
                        {{ $tanggalHariIni->translatedFormat('l, d F Y') }}
                    </p>
                </div>

                <div class="mt-3 mt-md-0">
                    <span class="badge bg-white text-primary px-3 py-2 rounded-pill fw-semibold shadow-sm">
                        <i class="bi bi-broadcast-pin me-1"></i>
                        Update Realtime
                    </span>
                </div>

            </div>

        </div>
    </div>


    {{-- =========================
        PENJUALAN & PEMBAYARAN
    ========================== --}}
    @can('viewAny', App\Models\User::class)

        <div class="row g-3 mb-4">

            <div class="col-12">
                <h4 class="fw-bold text-primary mb-3">
                    <i class="bi bi-bar-chart-fill me-2"></i>
                    Penjualan & Pembayaran
                </h4>
            </div>


            {{-- TOTAL PENJUALAN --}}
            <div class="col-md-6 col-lg-3">

                <div class="card card-custom shadow-sm h-100 bg-light">

                    <div class="card-body p-3">

                        <div class="d-flex align-items-center justify-content-between mb-2">

                            <span class="text-muted small fw-medium">
                                Total Penjualan
                            </span>

                            <div class="icon-box bg-primary bg-opacity-10 text-primary">
                                <i class="bi bi-cash-stack"></i>
                            </div>

                        </div>

                        <div class="stat-value text-dark">
                            Rp {{ number_format($ringkasan['total_penjualan'], 0, ',', '.') }}
                        </div>

                    </div>

                </div>

            </div>


            {{-- TOTAL TRANSAKSI --}}
            <div class="col-md-6 col-lg-3">

                <div class="card card-custom shadow-sm h-100 bg-light">

                    <div class="card-body p-3">

                        <div class="d-flex align-items-center justify-content-between mb-2">

                            <span class="text-muted small fw-medium">
                                Total Transaksi
                            </span>

                            <div class="icon-box bg-info bg-opacity-10 text-info">
                                <i class="bi bi-receipt"></i>
                            </div>

                        </div>

                        <div class="stat-value text-dark">
                            {{ $ringkasan['total_transaksi'] }}

                            <small class="fs-6 text-muted">
                                Struk
                            </small>
                        </div>

                    </div>

                </div>

            </div>


            {{-- PEMBAYARAN TUNAI --}}
            <div class="col-md-6 col-lg-3">

                <div class="card card-custom shadow-sm h-100 bg-light">

                    <div class="card-body p-3">

                        <div class="d-flex align-items-center justify-content-between mb-2">

                            <span class="text-muted small fw-medium">
                                Pembayaran Tunai
                            </span>

                            <div class="icon-box bg-success bg-opacity-10 text-success">
                                <i class="bi bi-wallet2"></i>
                            </div>

                        </div>

                        <div class="stat-value text-dark">
                            Rp {{ number_format($ringkasan['total_cash'], 0, ',', '.') }}
                        </div>

                    </div>

                </div>

            </div>


            {{-- NON TUNAI --}}
            <div class="col-md-6 col-lg-3">

                <div class="card card-custom shadow-sm h-100 bg-light">

                    <div class="card-body p-3">

                        <div class="d-flex align-items-center justify-content-between mb-2">

                            <span class="text-muted small fw-medium">
                                Non-Tunai
                            </span>

                            <div class="icon-box bg-primary bg-opacity-10 text-primary">
                                <i class="bi bi-credit-card"></i>
                            </div>

                        </div>

                        <div class="stat-value text-dark">
                            Rp {{ number_format($ringkasan['total_non_tunai'], 0, ',', '.') }}
                        </div>

                    </div>

                </div>

            </div>

        </div>

    @endcan


    {{-- =========================
        STATUS STOK
    ========================== --}}
    <div class="row g-4 mb-4">

        <div class="col-12">

            <h4 class="fw-bold text-primary mb-0">
                <i class="bi bi-box-seam me-2"></i>
                Status Stok
            </h4>

        </div>


        {{-- STOK RENDAH --}}
        <div class="col-md-6">

            <div class="card card-custom shadow-sm border-0 h-100">

                <div class="card-header bg-white border-0 pt-4 px-4 pb-0">

                    <div class="d-flex justify-content-between align-items-center">

                        <h5 class="fw-bold text-warning mb-0">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            Stok Menipis
                        </h5>

                        <span class="badge bg-warning text-dark rounded-pill">
                            Perlu Restock
                        </span>

                    </div>

                </div>


                <div class="card-body p-4">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle mb-0">

                            <thead class="table-light">

                                <tr>
                                    <th>#</th>
                                    <th>Nama Produk</th>
                                    <th class="text-center">Sisa Stok</th>
                                </tr>

                            </thead>


                            <tbody>

                                @forelse ($produkStokRendah as $index => $produk)

                                    <tr>

                                        <td>
                                            <span class="fw-semibold text-muted">
                                                {{ $produkStokRendah->firstItem() + $index }}
                                            </span>
                                        </td>

                                        <td class="fw-medium">
                                            <i class="bi bi-box me-2 text-primary"></i>
                                            {{ $produk->nama }}
                                        </td>

                                        <td class="text-center">

                                            <span class="badge bg-warning text-dark px-3 py-1 rounded-pill">
                                                {{ $produk->stok }}
                                            </span>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="3" class="text-muted text-center py-4">

                                            <i class="bi bi-check-circle-fill text-success me-2"></i>

                                            Semua stok aman terkendali.

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>


                    <div class="mt-3">
                        {{ $produkStokRendah->links() }}
                    </div>

                </div>

            </div>

        </div>


        {{-- STOK HABIS --}}
        <div class="col-md-6">

            <div class="card card-custom shadow-sm border-0 h-100">

                <div class="card-header bg-white border-0 pt-4 px-4 pb-0">

                    <div class="d-flex justify-content-between align-items-center">

                        <h5 class="fw-bold text-danger mb-0">
                            <i class="bi bi-x-circle-fill me-2"></i>
                            Produk Habis
                        </h5>

                        <span class="badge bg-danger rounded-pill">
                            Segera Isi
                        </span>

                    </div>

                </div>


                <div class="card-body p-4">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle mb-0">

                            <thead class="table-light">

                                <tr>
                                    <th>#</th>
                                    <th>Nama Produk</th>
                                    <th class="text-center">Stok</th>
                                </tr>

                            </thead>


                            <tbody>

                                @forelse ($produkStokHabis as $produk)

                                    <tr>

                                        <td>
                                            <span class="fw-semibold text-muted">
                                                {{ $loop->iteration }}
                                            </span>
                                        </td>

                                        <td class="fw-medium">
                                            <i class="bi bi-box me-2 text-primary"></i>
                                            {{ $produk->nama }}
                                        </td>

                                        <td class="text-center">

                                            <span class="badge bg-danger px-3 py-1 rounded-pill">
                                                {{ $produk->stok }}
                                            </span>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="3" class="text-muted text-center py-4">

                                            <i class="bi bi-check-circle-fill text-success me-2"></i>

                                            Tidak ada produk yang habis.

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>


                    <div class="mt-3">
                        {{ $produkStokHabis->links() }}
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================
        PRODUK TERLARIS
    ========================== --}}
    <div class="row">

        <div class="col-12">

            <div class="card card-custom shadow-sm border-0">

                <div class="card-header bg-white border-0 pt-4 px-4 pb-0">

                    <div class="d-flex justify-content-between align-items-center">

                        <h4 class="fw-bold text-primary mb-0">

                            <i class="bi bi-fire me-2"></i>

                            Produk Terlaris

                        </h4>

                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">

                            <i class="bi bi-star-fill me-1"></i>

                            Favorit Pelanggan

                        </span>

                    </div>

                </div>


                <div class="card-body p-4">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle mb-0">

                            <thead class="table-primary">

                                <tr>

                                    <th>
                                        Nama Produk
                                    </th>

                                    <th class="text-center">
                                        Sisa Stok
                                    </th>

                                    <th class="text-center">
                                        Total Terjual
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse ($produkTerlaris as $produk)

                                    <tr>

                                        <td class="fw-semibold text-dark">

                                            <i class="bi bi-star-fill text-warning me-2"></i>

                                            {{ $produk->nama }}

                                        </td>


                                        <td class="text-center">

                                            <span class="badge bg-secondary bg-opacity-10 text-dark px-3 py-1 rounded-pill">

                                                <i class="bi bi-box-seam me-1"></i>

                                                {{ $produk->stok }}

                                            </span>

                                        </td>


                                        <td class="text-center">

                                            <span class="badge bg-info text-dark px-3 py-1 rounded-pill fw-bold">

                                                <i class="bi bi-cart-check me-1"></i>

                                                {{ $produk->total_terjual }} Unit

                                            </span>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="3" class="text-muted text-center py-4">

                                            <i class="bi bi-info-circle me-2"></i>

                                            Belum ada data penjualan produk terlaris.

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection