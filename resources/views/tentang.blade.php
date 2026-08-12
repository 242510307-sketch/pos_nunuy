@extends('layouts.app')

@section('title', 'Tentang POS Nunuy')

@section('content')

<style>
    /* =========================================================
       GLOBAL
    ========================================================= */
    .about-page {
        max-width: 1450px;
        margin: 0 auto;
    }

    .about-card {
        border: none;
        border-radius: 22px;
        overflow: hidden;
        background: #fff;
    }

    .section-title {
        color: #0d6efd;
        font-weight: 700;
    }

    .section-subtitle {
        color: #6c757d;
    }

    /* =========================================================
       HERO
    ========================================================= */
    .about-hero {
        position: relative;
        overflow: hidden;
        border-radius: 25px;
        color: #fff;
        background:
            radial-gradient(
                circle at 85% 20%,
                rgba(255,255,255,.20),
                transparent 25%
            ),
            linear-gradient(
                135deg,
                #0d6efd 0%,
                #0dcaf0 100%
            );
    }

    .about-hero::before {
        content: "";
        position: absolute;
        width: 350px;
        height: 350px;
        border-radius: 50%;
        background: rgba(255,255,255,.07);
        top: -180px;
        right: -80px;
    }

    .about-hero::after {
        content: "";
        position: absolute;
        width: 250px;
        height: 250px;
        border-radius: 50%;
        background: rgba(255,255,255,.06);
        bottom: -150px;
        left: -80px;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-icon {
        width: 78px;
        height: 78px;
        border-radius: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,.18);
        backdrop-filter: blur(8px);
        font-size: 38px;
    }

    .hero-shop {
        font-size: 160px;
        opacity: .13;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 9px 15px;
        border-radius: 50px;
        background: rgba(255,255,255,.16);
        border: 1px solid rgba(255,255,255,.18);
        font-size: 13px;
    }

    /* =========================================================
       FEATURE
    ========================================================= */
    .feature-card {
        height: 100%;
        border: none;
        border-radius: 20px;
        background: #fff;
        transition: .3s ease;
    }

    .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(0,0,0,.10) !important;
    }

    .feature-icon {
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 19px;
        font-size: 30px;
        margin-bottom: 18px;
    }

    /* =========================================================
       INFO
    ========================================================= */
    .info-card {
        border: none;
        border-radius: 22px;
        background: #fff;
    }

    .info-icon {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        color: #0d6efd;
        background: rgba(13,110,253,.10);
        font-size: 23px;
        flex-shrink: 0;
    }

    /* =========================================================
       BIODATA
    ========================================================= */
    .profile-wrapper {
        background: linear-gradient(
            135deg,
            #f8fbff,
            #eef7ff
        );
    }

    .profile-left {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .profile-avatar {
        width: 165px;
        height: 165px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 22px;
        border-radius: 50%;
        color: #fff;
        background: linear-gradient(
            135deg,
            #0d6efd,
            #0dcaf0
        );
        border: 8px solid #fff;
        box-shadow: 0 12px 30px rgba(13,110,253,.20);
    }

    .profile-avatar i {
        font-size: 85px;
    }

    .profile-role {
        color: #6c757d;
        font-size: 15px;
    }

    .biodata-item {
        height: 100%;
        padding: 17px;
        border-radius: 15px;
        background: #f8f9fa;
        transition: .25s ease;
    }

    .biodata-item:hover {
        background: #edf6ff;
        transform: translateY(-3px);
    }

    .biodata-label {
        display: block;
        color: #6c757d;
        font-size: 12px;
        margin-bottom: 5px;
    }

    /* =========================================================
       PURPOSE
    ========================================================= */
    .purpose-item {
        display: flex;
        align-items: flex-start;
        padding: 14px 0;
        border-bottom: 1px solid #edf0f2;
    }

    .purpose-item:last-child {
        border-bottom: none;
    }

    .purpose-item i {
        margin-top: 3px;
    }

    /* =========================================================
       TECHNOLOGY
    ========================================================= */
    .tech-badge {
        padding: 12px 20px;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 600;
        transition: .25s ease;
    }

    .tech-badge:hover {
        transform: translateY(-4px);
    }

    /* =========================================================
       CONTACT
    ========================================================= */
    .contact-card {
        position: relative;
        overflow: hidden;
        background: linear-gradient(
            135deg,
            #f8fbff,
            #ffffff
        );
    }

    .contact-button {
        min-width: 145px;
        padding: 11px 22px;
        border-radius: 50px;
        font-weight: 600;
        transition: .3s ease;
        text-decoration: none;
    }

    .contact-button:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 22px rgba(0,0,0,.12);
    }

    .contact-info {
        height: 100%;
        padding: 18px;
        border-radius: 16px;
        background: #f8f9fa;
        transition: .25s ease;
    }

    .contact-info:hover {
        background: #eef6ff;
        transform: translateY(-3px);
    }

    /* =========================================================
       SYSTEM STATUS
    ========================================================= */
    .status-dot {
        width: 9px;
        height: 9px;
        display: inline-block;
        margin-right: 6px;
        border-radius: 50%;
        background: #198754;
        box-shadow: 0 0 0 4px rgba(25,135,84,.12);
    }

    /* =========================================================
       FOOTER
    ========================================================= */
    .about-footer {
        margin-top: 35px;
        padding: 30px 15px;
        border-top: 1px solid #e9ecef;
    }

    .footer-icon {
        width: 52px;
        height: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        border-radius: 15px;
        background: rgba(13,110,253,.10);
        color: #0d6efd;
        font-size: 25px;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */
    @media (max-width: 768px) {

        .about-page {
            padding-left: 8px;
            padding-right: 8px;
        }

        .about-hero {
            border-radius: 18px;
        }

        .hero-shop {
            font-size: 100px;
        }

        .profile-avatar {
            width: 135px;
            height: 135px;
        }

        .profile-avatar i {
            font-size: 68px;
        }

        .contact-button {
            width: 100%;
        }
    }
</style>


<div class="container-fluid py-4 about-page">

    {{-- =========================================================
         HERO
    ========================================================== --}}
    <div class="about-hero shadow-sm p-4 p-md-5 mb-4">

        <div class="hero-content">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <div class="d-flex align-items-center mb-4">

                        <div class="hero-icon me-3">
                            <i class="bi bi-shop-window"></i>
                        </div>

                        <div>

                            <h1 class="fw-bold mb-1">
                                POS Nunuy
                            </h1>

                            <span class="badge bg-white text-primary rounded-pill px-3 py-2">

                                <i class="bi bi-code-slash me-1"></i>

                                Point of Sale

                            </span>

                        </div>

                    </div>


                    <p class="fs-5 opacity-75 mb-4">

                        Sistem Point of Sale berbasis web yang dirancang
                        untuk membantu pengelolaan produk, stok,
                        pengguna, dan transaksi penjualan secara lebih
                        mudah, cepat, dan terorganisir.

                    </p>


                    <div class="d-flex flex-wrap gap-2">

                        <span class="hero-badge">
                            <i class="bi bi-box-seam"></i>
                            Produk
                        </span>

                        <span class="hero-badge">
                            <i class="bi bi-cart-check"></i>
                            Penjualan
                        </span>

                        <span class="hero-badge">
                            <i class="bi bi-people"></i>
                            Users
                        </span>

                        <span class="hero-badge">
                            <i class="bi bi-bar-chart"></i>
                            Dashboard
                        </span>

                    </div>

                </div>


                <div class="col-lg-4 text-center mt-4 mt-lg-0">

                    <i class="bi bi-shop hero-shop"></i>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         TENTANG SISTEM
    ========================================================== --}}
    <div class="card about-card shadow-sm mb-5">

        <div class="card-body p-4 p-md-5">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <div class="d-flex align-items-center mb-4">

                        <div class="info-icon me-3">
                            <i class="bi bi-info-circle-fill"></i>
                        </div>

                        <div>

                            <h3 class="section-title mb-1">
                                Tentang POS Nunuy
                            </h3>

                            <small class="text-muted">
                                Informasi mengenai sistem
                            </small>

                        </div>

                    </div>


                    <p class="text-muted">

                        POS Nunuy merupakan aplikasi Point of Sale
                        berbasis web yang dibuat untuk membantu
                        proses pengelolaan kegiatan penjualan
                        dalam sebuah usaha.

                    </p>


                    <p class="text-muted">

                        Sistem ini menyediakan berbagai fitur seperti
                        pengelolaan produk, stok, transaksi penjualan,
                        pengguna, serta dashboard untuk melihat
                        informasi penting secara ringkas.

                    </p>


                    <p class="text-muted mb-0">

                        Dengan sistem ini, proses pencatatan dan
                        pengelolaan data diharapkan menjadi lebih
                        cepat, terstruktur, efisien, dan mudah digunakan.

                    </p>

                </div>


                <div class="col-lg-4 text-center mt-4 mt-lg-0">

                    <i
                        class="bi bi-pc-display-horizontal text-primary"
                        style="font-size: 120px;"
                    ></i>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         FITUR SISTEM
    ========================================================== --}}
    <div class="mb-5">

        <div class="text-center mb-4">

            <h3 class="section-title">

                <i class="bi bi-grid-3x3-gap-fill me-2"></i>

                Fitur Sistem

            </h3>

            <p class="section-subtitle">
                Fitur utama yang tersedia pada POS Nunuy.
            </p>

        </div>


        <div class="row g-4">

            {{-- PRODUK --}}
            <div class="col-md-6 col-xl-3">

                <div class="card feature-card shadow-sm">

                    <div class="card-body p-4">

                        <div class="feature-icon bg-primary bg-opacity-10 text-primary">

                            <i class="bi bi-box-seam-fill"></i>

                        </div>

                        <h5 class="fw-bold">
                            Produk
                        </h5>

                        <p class="text-muted small mb-0">

                            Mengelola data produk, harga beli,
                            harga jual, foto produk, dan stok barang.

                        </p>

                    </div>

                </div>

            </div>


            {{-- PENJUALAN --}}
            <div class="col-md-6 col-xl-3">

                <div class="card feature-card shadow-sm">

                    <div class="card-body p-4">

                        <div class="feature-icon bg-success bg-opacity-10 text-success">

                            <i class="bi bi-cart-check-fill"></i>

                        </div>

                        <h5 class="fw-bold">
                            Penjualan
                        </h5>

                        <p class="text-muted small mb-0">

                            Mencatat transaksi, pembayaran,
                            total penjualan, dan riwayat transaksi.

                        </p>

                    </div>

                </div>

            </div>


            {{-- USERS --}}
            <div class="col-md-6 col-xl-3">

                <div class="card feature-card shadow-sm">

                    <div class="card-body p-4">

                        <div class="feature-icon bg-warning bg-opacity-10 text-warning">

                            <i class="bi bi-people-fill"></i>

                        </div>

                        <h5 class="fw-bold">
                            Users
                        </h5>

                        <p class="text-muted small mb-0">

                            Mengelola akun pengguna,
                            role, serta hak akses sistem.

                        </p>

                    </div>

                </div>

            </div>


            {{-- DASHBOARD --}}
            <div class="col-md-6 col-xl-3">

                <div class="card feature-card shadow-sm">

                    <div class="card-body p-4">

                        <div class="feature-icon bg-danger bg-opacity-10 text-danger">

                            <i class="bi bi-speedometer2"></i>

                        </div>

                        <h5 class="fw-bold">
                            Dashboard
                        </h5>

                        <p class="text-muted small mb-0">

                            Menampilkan ringkasan penjualan,
                            transaksi, stok, dan informasi penting.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         BIODATA PENGEMBANG
    ========================================================== --}}
    <div class="card about-card shadow-sm mb-5">

        <div class="profile-wrapper">

            <div class="row g-0">

                {{-- PROFILE --}}
                <div class="col-lg-4">

                    <div class="profile-left p-4 p-md-5 text-center">

                        <div>

                            <div class="profile-avatar">

                                <i class="bi bi-person-fill"></i>

                            </div>


                            <h3 class="fw-bold mb-1">
                                Nurul Kayla Ramadhani
                            </h3>


                            <p class="profile-role mb-3">

                                <i class="bi bi-code-slash me-1"></i>

                                Web Developer

                            </p>


                            <span class="badge bg-primary rounded-pill px-3 py-2">

                                <i class="bi bi-person-badge me-1"></i>

                                Pengembang POS Nunuy

                            </span>

                        </div>

                    </div>

                </div>


                {{-- BIODATA --}}
                <div class="col-lg-8 bg-white">

                    <div class="p-4 p-md-5">

                        <div class="d-flex align-items-center mb-4">

                            <div class="info-icon me-3">

                                <i class="bi bi-person-vcard-fill"></i>

                            </div>

                            <div>

                                <h3 class="section-title mb-1">
                                    Biodata Pengembang
                                </h3>

                                <small class="text-muted">
                                    Informasi mengenai pembuat sistem
                                </small>

                            </div>

                        </div>


                        <div class="row g-3">

                            {{-- NAMA --}}
                            <div class="col-md-6">

                                <div class="biodata-item">

                                    <span class="biodata-label">

                                        <i class="bi bi-person me-1"></i>

                                        Nama Lengkap

                                    </span>

                                    <strong>
                                        Nurul Kayla Ramadhani
                                    </strong>

                                </div>

                            </div>


                            {{-- NIM --}}
                            <div class="col-md-6">

                                <div class="biodata-item">

                                    <span class="biodata-label">

                                        <i class="bi bi-card-text me-1"></i>

                                        NIM / NIS

                                    </span>

                                    <strong>
                                        123456789
                                    </strong>

                                </div>

                            </div>


                            {{-- KELAS --}}
                            <div class="col-md-6">

                                <div class="biodata-item">

                                    <span class="biodata-label">

                                        <i class="bi bi-mortarboard-fill me-1"></i>

                                        Kelas

                                    </span>

                                    <strong>
                                        XII PPLG 4
                                    </strong>

                                </div>

                            </div>


                            {{-- JURUSAN --}}
                            <div class="col-md-6">

                                <div class="biodata-item">

                                    <span class="biodata-label">

                                        <i class="bi bi-book-fill me-1"></i>

                                        Program Studi

                                    </span>

                                    <strong>
                                        PPLG
                                    </strong>

                                </div>

                            </div>


                            {{-- SEKOLAH --}}
                            <div class="col-md-6">

                                <div class="biodata-item">

                                    <span class="biodata-label">

                                        <i class="bi bi-building me-1"></i>

                                        Institusi

                                    </span>

                                    <strong>
                                        SMKN 4 TASIKMALAYA
                                    </strong>

                                </div>

                            </div>


                            {{-- TAHUN --}}
                            <div class="col-md-6">

                                <div class="biodata-item">

                                    <span class="biodata-label">

                                        <i class="bi bi-calendar-event me-1"></i>

                                        Tahun

                                    </span>

                                    <strong>
                                        {{ date('Y') }}
                                    </strong>

                                </div>

                            </div>

                        </div>


                        {{-- TENTANG SAYA --}}
                        <div class="mt-4">

                            <h5 class="fw-bold">

                                <i class="bi bi-chat-left-text-fill text-primary me-2"></i>

                                Tentang Saya

                            </h5>

                            <p class="text-muted mb-0">

                                Saya merupakan pelajar yang memiliki
                                ketertarikan terhadap teknologi informasi,
                                khususnya dalam bidang pengembangan
                                aplikasi berbasis web.

                                POS Nunuy dibuat sebagai salah satu
                                proyek untuk menerapkan pengetahuan
                                mengenai pemrograman, database,
                                dan pengembangan sistem informasi.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         TUJUAN + INFORMASI SISTEM
    ========================================================== --}}
    <div class="row g-4 mb-5">

        {{-- TUJUAN --}}
        <div class="col-lg-6">

            <div class="card info-card shadow-sm h-100">

                <div class="card-body p-4 p-md-5">

                    <div class="d-flex align-items-center mb-4">

                        <div class="info-icon me-3">

                            <i class="bi bi-bullseye"></i>

                        </div>

                        <h4 class="section-title mb-0">
                            Tujuan Sistem
                        </h4>

                    </div>


                    <div class="purpose-item">

                        <i class="bi bi-check-circle-fill text-success me-3"></i>

                        <span>
                            Mempermudah pencatatan transaksi penjualan.
                        </span>

                    </div>


                    <div class="purpose-item">

                        <i class="bi bi-check-circle-fill text-success me-3"></i>

                        <span>
                            Mempermudah pengelolaan data produk.
                        </span>

                    </div>


                    <div class="purpose-item">

                        <i class="bi bi-check-circle-fill text-success me-3"></i>

                        <span>
                            Membantu memantau stok barang.
                        </span>

                    </div>


                    <div class="purpose-item">

                        <i class="bi bi-check-circle-fill text-success me-3"></i>

                        <span>
                            Mengelola data pengguna dan hak akses.
                        </span>

                    </div>


                    <div class="purpose-item">

                        <i class="bi bi-check-circle-fill text-success me-3"></i>

                        <span>
                            Menampilkan riwayat transaksi secara terstruktur.
                        </span>

                    </div>


                    <div class="purpose-item">

                        <i class="bi bi-check-circle-fill text-success me-3"></i>

                        <span>
                            Membantu meningkatkan efisiensi pengelolaan usaha.
                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- INFORMASI SISTEM --}}
        <div class="col-lg-6">

            <div class="card info-card shadow-sm h-100">

                <div class="card-body p-4 p-md-5">

                    <div class="d-flex align-items-center mb-4">

                        <div class="info-icon me-3">

                            <i class="bi bi-info-square-fill"></i>

                        </div>

                        <h4 class="section-title mb-0">
                            Informasi Sistem
                        </h4>

                    </div>


                    <div class="row g-4">

                        <div class="col-6">

                            <small class="text-muted d-block">
                                Nama Sistem
                            </small>

                            <strong>
                                POS Nunuy
                            </strong>

                        </div>


                        <div class="col-6">

                            <small class="text-muted d-block">
                                Versi
                            </small>

                            <strong>
                                1.0.0
                            </strong>

                        </div>


                        <div class="col-6">

                            <small class="text-muted d-block">
                                Platform
                            </small>

                            <strong>
                                Web Application
                            </strong>

                        </div>


                        <div class="col-6">

                            <small class="text-muted d-block">
                                Database
                            </small>

                            <strong>
                                MySQL
                            </strong>

                        </div>


                        <div class="col-6">

                            <small class="text-muted d-block">
                                Framework
                            </small>

                            <strong>
                                Laravel
                            </strong>

                        </div>


                        <div class="col-6">

                            <small class="text-muted d-block">
                                Bootstrap
                            </small>

                            <strong>
                                5.3
                            </strong>

                        </div>


                        <div class="col-6">

                            <small class="text-muted d-block">
                                Tahun
                            </small>

                            <strong>
                                {{ date('Y') }}
                            </strong>

                        </div>


                        <div class="col-6">

                            <small class="text-muted d-block">
                                Status
                            </small>

                            <span class="badge bg-success rounded-pill">

                                <span class="status-dot"></span>

                                Aktif

                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         TEKNOLOGI
    ========================================================== --}}
    <div class="card info-card shadow-sm mb-5">

        <div class="card-body p-4 p-md-5 text-center">

            <h3 class="section-title mb-2">

                <i class="bi bi-code-square me-2"></i>

                Teknologi yang Digunakan

            </h3>

            <p class="text-muted mb-4">

                Teknologi yang digunakan dalam pengembangan
                aplikasi POS Nunuy.

            </p>


            <div class="d-flex justify-content-center flex-wrap gap-3">

                <span class="badge bg-danger tech-badge">

                    <i class="bi bi-filetype-php me-2"></i>

                    PHP

                </span>


                <span class="badge bg-danger tech-badge">

                    <i class="bi bi-layers me-2"></i>

                    Laravel

                </span>


                <span class="badge bg-primary tech-badge">

                    <i class="bi bi-bootstrap me-2"></i>

                    Bootstrap

                </span>


                <span class="badge bg-info text-dark tech-badge">

                    <i class="bi bi-database-fill me-2"></i>

                    MySQL

                </span>


                <span class="badge bg-dark tech-badge">

                    <i class="bi bi-git me-2"></i>

                    Git

                </span>


                <span class="badge bg-warning text-dark tech-badge">

                    <i class="bi bi-filetype-html me-2"></i>

                    HTML5

                </span>


                <span class="badge bg-primary tech-badge">

                    <i class="bi bi-filetype-css me-2"></i>

                    CSS3

                </span>


                <span class="badge bg-dark tech-badge">

                    <i class="bi bi-filetype-js me-2"></i>

                    JavaScript

                </span>

            </div>

        </div>

    </div>


    {{-- =========================================================
         KONTAK
    ========================================================== --}}
    <div class="card info-card contact-card shadow-sm mb-5">

        <div class="card-body p-4 p-md-5 text-center">

            <h3 class="section-title mb-2">

                <i class="bi bi-person-lines-fill me-2"></i>

                Hubungi Saya

            </h3>

            <p class="text-muted mb-4">

                Silakan hubungi saya melalui kontak dan media sosial
                berikut.

            </p>


            {{-- =================================================
                 TOMBOL KONTAK
            ================================================== --}}
            <div class="d-flex justify-content-center flex-wrap gap-3">


                {{-- EMAIL --}}
                <a
                    href="mailto:nurulkayla007@gmail.com?subject=Informasi%20POS%20Nunuy&body=Halo%20Nurul,%20saya%20ingin%20menghubungi%20Anda%20mengenai%20POS%20Nunuy."
                    class="btn btn-outline-primary contact-button"
                >

                    <i class="bi bi-envelope-fill me-2"></i>

                    Email

                </a>


                {{-- WHATSAPP --}}
                <a
                    href="https://wa.me/6281234567890?text=Halo%20Nurul,%20saya%20ingin%20bertanya%20mengenai%20POS%20Nunuy"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="btn btn-outline-success contact-button"
                >

                    <i class="bi bi-whatsapp me-2"></i>

                    WhatsApp

                </a>


                {{-- GITHUB --}}
                <a
                    href="https://github.com/nurulkayla"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="btn btn-outline-dark contact-button"
                >

                    <i class="bi bi-github me-2"></i>

                    GitHub

                </a>


                {{-- INSTAGRAM --}}
                <a
                    href="https://www.instagram.com/kylrmdhniii/"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="btn btn-outline-danger contact-button"
                >

                    <i class="bi bi-instagram me-2"></i>

                    Instagram

                </a>

            </div>


            {{-- =================================================
                 DETAIL KONTAK
            ================================================== --}}
            <div class="row g-3 justify-content-center mt-4">


                {{-- EMAIL --}}
                <div class="col-sm-6 col-lg-3">

                    <div class="contact-info">

                        <i class="bi bi-envelope-fill text-primary fs-3"></i>

                        <small class="text-muted d-block mt-2">
                            Email
                        </small>

                        <strong class="small">
                            nurulkayla007@gmail.com
                        </strong>

                    </div>

                </div>


                {{-- WHATSAPP --}}
                <div class="col-sm-6 col-lg-3">

                    <div class="contact-info">

                        <i class="bi bi-whatsapp text-success fs-3"></i>

                        <small class="text-muted d-block mt-2">
                            WhatsApp
                        </small>

                        <strong class="small">
                            +62 812-3456-7890
                        </strong>

                    </div>

                </div>


                {{-- GITHUB --}}
                <div class="col-sm-6 col-lg-3">

                    <div class="contact-info">

                        <i class="bi bi-github text-dark fs-3"></i>

                        <small class="text-muted d-block mt-2">
                            GitHub
                        </small>

                        <strong class="small">
                            @nurulkayla
                        </strong>

                    </div>

                </div>


                {{-- INSTAGRAM --}}
                <div class="col-sm-6 col-lg-3">

                    <div class="contact-info">

                        <i class="bi bi-instagram text-danger fs-3"></i>

                        <small class="text-muted d-block mt-2">
                            Instagram
                        </small>

                        <strong class="small">
                            @kylrmdhniii
                        </strong>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         FOOTER
    ========================================================== --}}
    <div class="about-footer text-center">

        <div class="footer-icon">

            <i class="bi bi-shop"></i>

        </div>


        <h5 class="fw-bold mt-3 mb-1">

            POS Nunuy

        </h5>


        <p class="text-muted small mb-2">

            Sistem Point of Sale untuk membantu
            pengelolaan usaha menjadi lebih mudah,
            cepat, dan terorganisir.

        </p>


        <div class="d-flex justify-content-center gap-2 mb-3">

            <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2">

                <i class="bi bi-code-slash me-1"></i>

                Web Application

            </span>

            <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2">

                <i class="bi bi-check-circle me-1"></i>

                Aktif

            </span>

        </div>


        <small class="text-muted">

            © {{ date('Y') }} POS Nunuy.
            All Rights Reserved.

        </small>

    </div>

</div>

@endsection