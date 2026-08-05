<?php $__env->startSection('title', 'Riwayat Penjualan'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

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
    </style>

    <div class="container py-4">
        
        <?php if(session('errors')): ?>
            <div class="alert alert-danger alert-dismissible fade show rounded-4 border-0 shadow-sm mb-4" role="alert">
                <strong>⚠️ Ups! Ada Masalah:</strong> <?php echo e(session('errors')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        
        <div class="card bg-gradient-blue text-white shadow-sm mb-4 rounded-4 border-0">
            <div class="card-body p-4 text-center text-md-start d-flex flex-column flex-md-row align-items-center justify-content-between">
                <div>
                    <h2 class="fw-bold mb-1">🛒 Riwayat Penjualan</h2>
                    <p class="mb-0 opacity-75">
                        Pantau seluruh transaksi kasir, metode pembayaran, dan status transaksi.
                    </p>
                </div>
                <div class="mt-3 mt-md-0">
                    <a href="<?php echo e(route('penjualan.create')); ?>" class="btn btn-light text-primary fw-bold px-4 py-2 rounded-pill shadow-sm">
                        ✨ Transaksi Baru
                    </a>
                </div>
            </div>
        </div>

        
        <div class="card card-custom shadow-sm">
            <div class="card-body p-4">

                
                <form action="<?php echo e(route('penjualan.index')); ?>" method="GET" class="mb-4">
                    <div class="row g-2">
                        <div class="col-md-6 col-lg-4 ms-auto">
                            <div class="input-group">
                                <input type="text" name="search" value="<?php echo e(request('search')); ?>" 
                                       class="form-control search-input rounded-start-pill ps-3"
                                       placeholder="🔍 Cari kode transaksi atau kasir...">
                                <button class="btn btn-gradient-blue rounded-end-pill px-4" type="submit">
                                    Cari
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col" class="text-center" style="width: 50px;">#</th>
                                <th scope="col">Tanggal Transaksi</th>
                                <th scope="col">Kasir</th>
                                <th scope="col">Total Pembayaran</th>
                                <th scope="col" class="text-center">Metode</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center" style="width: 220px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="text-center fw-semibold text-muted">
                                        <?php echo e($sales->firstItem() + $loop->index); ?>

                                    </td>
                                    <td>
                                        <span class="fw-medium text-dark">
                                            📅 <?php echo e($sale->created_at->translatedFormat('d M Y, H:i')); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-dark">
                                            👤 <?php echo e($sale->user->name ?? 'Kasir'); ?>

                                        </span>
                                    </td>
                                    <td class="fw-bold text-primary">
                                        Rp <?php echo e(number_format($sale->total_pembayaran, 0, ',', '.')); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php if(strtolower($sale->metode_pembayaran) == 'cash' || strtolower($sale->metode_pembayaran) == 'tunai'): ?>
                                            <span class="badge bg-success bg-opacity-10 text-success border border-success-subtle px-3 py-1 rounded-pill fw-medium">
                                                💵 <?php echo e(ucfirst($sale->metode_pembayaran)); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="badge bg-info bg-opacity-10 text-primary border border-primary-subtle px-3 py-1 rounded-pill fw-medium">
                                                💳 <?php echo e(ucfirst($sale->metode_pembayaran)); ?>

                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if(strtolower($sale->status) == 'lunas' || strtolower($sale->status) == 'completed' || strtolower($sale->status) == 'sukses'): ?>
                                            <span class="badge bg-success text-white px-3 py-1 rounded-pill fw-medium">
                                                ✅ <?php echo e(ucfirst($sale->status)); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="badge bg-warning text-dark px-3 py-1 rounded-pill fw-medium">
                                                ⏳ <?php echo e(ucfirst($sale->status)); ?>

                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="<?php echo e(route('penjualan.show', $sale)); ?>" class="btn btn-sm btn-outline-info rounded-pill px-3 fw-medium">
                                                👁️ Detail
                                            </a>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $sale)): ?>
                                                <a href="<?php echo e(route('penjualan.edit', $sale)); ?>" class="btn btn-sm btn-outline-warning rounded-pill px-3 fw-medium">
                                                    ✏️ Edit
                                                </a>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $sale)): ?>
                                                <form action="<?php echo e(route('penjualan.destroy', $sale)); ?>" method="POST" class="d-inline">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-medium" 
                                                            onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">
                                                        🗑️ Hapus
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="7" class="text-muted text-center py-5">
                                        🧾 Belum ada riwayat transaksi penjualan.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                
                <div class="mt-4 d-flex justify-content-end">
                    <?php echo e($sales->links()); ?>

                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_nunuy\resources\views/penjualan/index.blade.php ENDPATH**/ ?>