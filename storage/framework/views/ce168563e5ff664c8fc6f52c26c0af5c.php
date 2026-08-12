<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
    <div class="container-fluid">

        
        <a class="navbar-brand fw-bold" href="<?php echo e(route('dashboard')); ?>">
            <i class="bi bi-shop me-1"></i>
            POS
        </a>

        
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button>

        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                
                <li class="nav-item">
                    <a
                        class="nav-link <?php echo e(Request::is('dashboard') ? 'active fw-bold' : ''); ?>"
                        href="<?php echo e(route('dashboard')); ?>"
                    >
                        <i class="bi bi-speedometer2 me-1"></i>
                        Dashboard
                    </a>
                </li>

                
                <li class="nav-item">
                    <a
                        class="nav-link <?php echo e(Request::is('admin/users*') ? 'active fw-bold' : ''); ?>"
                        href="<?php echo e(route('admin.users')); ?>"
                    >
                        <i class="bi bi-people me-1"></i>
                        Users
                    </a>
                </li>

                
                <li class="nav-item">
                    <a
                        class="nav-link <?php echo e(Request::is('produk*') ? 'active fw-bold' : ''); ?>"
                        href="<?php echo e(route('produk.index')); ?>"
                    >
                        <i class="bi bi-box-seam me-1"></i>
                        Produk
                    </a>
                </li>

                
                <li class="nav-item">
                    <a
                        class="nav-link <?php echo e(Request::is('penjualan*') ? 'active fw-bold' : ''); ?>"
                        href="<?php echo e(route('penjualan.index')); ?>"
                    >
                        <i class="bi bi-cart3 me-1"></i>
                        Penjualan
                    </a>
                </li>

                
                <li class="nav-item">
                    <a
                        class="nav-link <?php echo e(Request::is('tentang*') ? 'active fw-bold' : ''); ?>"
                        href="<?php echo e(route('tentang')); ?>"
                    >
                        <i class="bi bi-info-circle me-1"></i>
                        Tentang
                    </a>
                </li>

            </ul>

            
            <form
                action="<?php echo e(route('logout')); ?>"
                method="POST"
                class="d-flex"
            >
                <?php echo csrf_field(); ?>

                <button
                    class="btn btn-danger"
                    type="submit"
                >
                    <i class="bi bi-box-arrow-right me-1"></i>
                    Logout
                </button>
            </form>

        </div>
    </div>
</nav><?php /**PATH C:\laragon\www\pos_nunuy\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>