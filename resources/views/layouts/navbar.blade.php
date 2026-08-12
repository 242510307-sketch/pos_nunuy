<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
    <div class="container-fluid">

        {{-- Logo --}}
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            <i class="bi bi-shop me-1"></i>
            POS
        </a>

        {{-- Tombol mobile --}}
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

        {{-- Menu --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                {{-- Dashboard --}}
                <li class="nav-item">
                    <a
                        class="nav-link {{ Request::is('dashboard') ? 'active fw-bold' : '' }}"
                        href="{{ route('dashboard') }}"
                    >
                        <i class="bi bi-speedometer2 me-1"></i>
                        Dashboard
                    </a>
                </li>

                {{-- Users --}}
                <li class="nav-item">
                    <a
                        class="nav-link {{ Request::is('admin/users*') ? 'active fw-bold' : '' }}"
                        href="{{ route('admin.users') }}"
                    >
                        <i class="bi bi-people me-1"></i>
                        Users
                    </a>
                </li>

                {{-- Produk --}}
                <li class="nav-item">
                    <a
                        class="nav-link {{ Request::is('produk*') ? 'active fw-bold' : '' }}"
                        href="{{ route('produk.index') }}"
                    >
                        <i class="bi bi-box-seam me-1"></i>
                        Produk
                    </a>
                </li>

                {{-- Penjualan --}}
                <li class="nav-item">
                    <a
                        class="nav-link {{ Request::is('penjualan*') ? 'active fw-bold' : '' }}"
                        href="{{ route('penjualan.index') }}"
                    >
                        <i class="bi bi-cart3 me-1"></i>
                        Penjualan
                    </a>
                </li>

                {{-- Tentang --}}
                <li class="nav-item">
                    <a
                        class="nav-link {{ Request::is('tentang*') ? 'active fw-bold' : '' }}"
                        href="{{ route('tentang') }}"
                    >
                        <i class="bi bi-info-circle me-1"></i>
                        Tentang
                    </a>
                </li>

            </ul>

            {{-- Logout --}}
            <form
                action="{{ route('logout') }}"
                method="POST"
                class="d-flex"
            >
                @csrf

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
</nav>