<?php $__env->startSection('title', 'Dashboard Ringkasan'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <style>
        .bg-gradient-blue {
            background: linear-gradient(135deg, #0d6efd 0%, #0dcaf0 100%);
        }
        .card-custom {
            border: none;
            border-radius: 16px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
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
            font-size: 1.5rem;
        }
    </style>

    <div class="container py-4">
        
        <div class="card bg-gradient-blue text-white shadow-sm mb-4 rounded-4 border-0">
            <div class="card-body p-4 text-center text-md-start d-flex flex-column flex-md-row align-items-center justify-content-between">
                <div>
                    <h2 class="fw-bold mb-1">✨ Ringkasan Hari Ini</h2>
                    <p class="mb-0 opacity-75">
                        📅 <?php echo e($tanggalHariIni->translatedFormat('l, d F Y')); ?>

                    </p>
                </div>
                <div class="mt-3 mt-md-0">
                    <span class="badge bg-white text-primary px-3 py-2 rounded-pill fw-semibold shadow-sm">
                        🚀 Update Realtime
                    </span>
                </div>
            </div>
        </div>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', App\Models\User::class)): ?>
            
            <div class="row g-3 mb-4">
                <div class="col-12">
                    <h4 class="fw-bold text-primary mb-3">📊 Penjualan & Pembayaran</h4>
                </div>
                
                
                <div class="col-md-6 col-lg-3">
                    <div class="card card-custom shadow-sm h-100 bg-light">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="text-muted small fw-medium">Total Penjualan</span>
                                <div class="icon-box bg-primary bg-opacity-10 text-primary">💰</div>
                            </div>
                            <h4 class="fw-bold text-dark mb-0">Rp <?php echo e(number_format($ringkasan['total_penjualan'])); ?></h4>
                        </div>
                    </div>
                </div>

                
                <div class="col-md-6 col-lg-3">
                    <div class="card card-custom shadow-sm h-100 bg-light">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="text-muted small fw-medium">Total Transaksi</span>
                                <div class="icon-box bg-info bg-opacity-10 text-info">🛍️</div>
                            </div>
                            <h4 class="fw-bold text-dark mb-0"><?php echo e($ringkasan['total_transaksi']); ?> <small class="fs-6 text-muted">Struk</small></h4>
                        </div>
                    </div>
                </div>

                
                <div class="col-md-6 col-lg-3">
                    <div class="card card-custom shadow-sm h-100 bg-light">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="text-muted small fw-medium">Pembayaran Tunai</span>
                                <div class="icon-box bg-success bg-opacity-10 text-success">💵</div>
                            </div>
                            <h4 class="fw-bold text-dark mb-0">Rp <?php echo e(number_format($ringkasan['total_cash'])); ?></h4>
                        </div>
                    </div>
                </div>

                
                <div class="col-md-6 col-lg-3">
                    <div class="card card-custom shadow-sm h-100 bg-light">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="text-muted small fw-medium">Non-Tunai (QRIS/Debit)</span>
                                <div class="icon-box bg-primary bg-opacity-10 text-primary">💳</div>
                            </div>
                            <h4 class="fw-bold text-dark mb-0">Rp <?php echo e(number_format($ringkasan['total_non_tunai'])); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        
        <div class="row g-4 mb-4">
            <div class="col-12">
                <h4 class="fw-bold text-primary mb-0">⚠️ Status Stok Kritis</h4>
            </div>

            
            <div class="col-md-6">
                <div class="card card-custom shadow-sm border-0">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-0 d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold text-warning mb-0">⚠️ Stok Menipis</h5>
                        <span class="badge bg-warning text-dark rounded-pill">Perlu Restock</span>
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
                                    <?php $__empty_1 = true; $__currentLoopData = $produkStokRendah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><span class="fw-semibold text-muted"><?php echo e($produkStokRendah->firstItem() + $index); ?></span></td>
                                            <td class="fw-medium"><?php echo e($produk->nama); ?></td>
                                            <td class="text-center">
                                                <span class="badge bg-warning text-dark px-3 py-1 rounded-pill"><?php echo e($produk->stok); ?></span>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="3" class="text-muted text-center py-4">
                                                🎉 All good! Semua stok aman terkendali.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            <?php echo e($produkStokRendah->links()); ?>

                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col-md-6">
                <div class="card card-custom shadow-sm border-0">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-0 d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold text-danger mb-0">🚫 Produk Habis</h5>
                        <span class="badge bg-danger rounded-pill">Segera Isi</span>
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
                                    <?php $__empty_1 = true; $__currentLoopData = $produkStokHabis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><span class="fw-semibold text-muted"><?php echo e($loop->iteration); ?></span></td>
                                            <td class="fw-medium"><?php echo e($produk->nama); ?></td>
                                            <td class="text-center">
                                                <span class="badge bg-danger px-3 py-1 rounded-pill"><?php echo e($produk->stok); ?></span>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="3" class="text-muted text-center py-4">
                                                ✨ Tidak ada produk yang habis!
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            <?php echo e($produkStokHabis->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="row">
            <div class="col-12">
                <div class="card card-custom shadow-sm border-0">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-0 d-flex justify-content-between align-items-center">
                        <h4 class="fw-bold text-primary mb-0">🔥 Produk Terlaris (Best Seller)</h4>
                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">Favorit Pelanggan</span>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th class="text-center">Sisa Stok</th>
                                        <th class="text-center">Total Terjual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $produkTerlaris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="fw-semibold text-dark">
                                                ⭐ <?php echo e($produk->nama); ?>

                                            </td>
                                            <td class="text-center">
                                                <span class="badge bg-secondary bg-opacity-10 text-dark px-3 py-1 rounded-pill"><?php echo e($produk->stok); ?></span>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge bg-info text-dark px-3 py-1 rounded-pill fw-bold">
                                                    📦 <?php echo e($produk->total_terjual); ?> Unit
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="3" class="text-muted text-center py-4">
                                                Belum ada data penjualan produk terlaris.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_nunuy\resources\views/dashboard.blade.php ENDPATH**/ ?>