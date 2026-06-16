@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<style>

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    html, body {
        width: 100%;
        overflow-x: hidden;
        background: #f8fafc;
        font-family: 'Poppins', sans-serif;
    }

    /* =====================
       NAVBAR ONE-PAGE
    ===================== */
    .navbar-onepage {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        padding: 18px 60px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: transparent;
        transition: background 0.4s, box-shadow 0.4s;
    }

    .navbar-onepage.scrolled {
        background: rgba(15, 23, 42, 0.95);
        backdrop-filter: blur(12px);
        box-shadow: 0 2px 20px rgba(0,0,0,0.2);
    }

    .nav-logo {
        font-size: 20px;
        font-weight: 800;
        color: white;
        text-decoration: none;
        letter-spacing: 1px;
    }

    .nav-logo span {
        color: #dc2626;
    }

    .nav-links {
        display: flex;
        gap: 36px;
        list-style: none;
    }

    .nav-links a {
        color: rgba(255,255,255,0.85);
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.5px;
        transition: color 0.2s;
        position: relative;
        padding-bottom: 4px;
    }

    .nav-links a::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: #dc2626;
        transition: width 0.3s;
    }

    .nav-links a:hover,
    .nav-links a.active {
        color: white;
    }

    .nav-links a:hover::after,
    .nav-links a.active::after {
        width: 100%;
    }

    .nav-cta {
        padding: 10px 24px;
        background: #dc2626;
        color: white !important;
        border-radius: 10px;
        font-weight: 600 !important;
        transition: background 0.2s, transform 0.2s !important;
    }

    .nav-cta::after {
        display: none !important;
    }

    .nav-cta:hover {
        background: #b91c1c !important;
        transform: translateY(-2px);
        color: white !important;
    }

    /* hamburger */
    .nav-toggle {
        display: none;
        flex-direction: column;
        gap: 5px;
        cursor: pointer;
        padding: 4px;
    }

    .nav-toggle span {
        width: 26px;
        height: 2px;
        background: white;
        border-radius: 2px;
        transition: 0.3s;
    }

    /* =====================
       SECTION SCROLL OFFSET
    ===================== */
    section[id] {
        scroll-margin-top: 80px;
    }

    /* =====================
       HERO
    ===================== */
    #hero {
        width: 100%;
        min-height: 100vh;
        background:
            linear-gradient(rgba(15,23,42,0.68), rgba(15,23,42,0.68)),
            url('{{ asset('storage/produk/umroh.jpeg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        padding: 120px 20px 80px;
    }

    .hero-content {
        max-width: 950px;
    }

    .hero-content > span {
        letter-spacing: 5px;
        font-size: 14px;
        color: #fca5a5;
        font-weight: 600;
    }

    .hero-content h1 {
        font-size: 72px;
        line-height: 1.1;
        margin: 24px 0;
        font-weight: 800;
    }

    .hero-content p {
        font-size: 20px;
        color: #e2e8f0;
        margin-bottom: 45px;
        line-height: 1.9;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    .hero-buttons {
        display: flex;
        gap: 16px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .hero-btn {
        display: inline-block;
        padding: 16px 40px;
        background: #dc2626;
        color: white;
        text-decoration: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        transition: 0.3s;
    }

    .hero-btn:hover {
        background: #b91c1c;
        transform: translateY(-4px);
    }

    .hero-btn-outline {
        display: inline-block;
        padding: 16px 40px;
        border: 2px solid rgba(255,255,255,0.6);
        color: white;
        text-decoration: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        transition: 0.3s;
    }

    .hero-btn-outline:hover {
        border-color: white;
        background: rgba(255,255,255,0.1);
        transform: translateY(-4px);
    }

    /* scroll indicator */
    .scroll-down {
        position: absolute;
        bottom: 36px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
        color: rgba(255,255,255,0.5);
        font-size: 11px;
        letter-spacing: 2px;
        text-transform: uppercase;
        animation: bounce 2s infinite;
    }

    .scroll-down svg {
        width: 20px;
        height: 20px;
    }

    @keyframes bounce {
        0%, 100% { transform: translateX(-50%) translateY(0); }
        50% { transform: translateX(-50%) translateY(8px); }
    }

    /* =====================
       ABOUT
    ===================== */
    #tentang {
        width: 85%;
        margin: 120px auto;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 70px;
        align-items: center;
    }

    .about-image img {
        width: 100%;
        height: 520px;
        object-fit: cover;
        border-radius: 28px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.12);
    }

    .about-text > span {
        color: #dc2626;
        font-weight: 700;
        letter-spacing: 3px;
        font-size: 12px;
    }

    .about-text h2 {
        font-size: 48px;
        line-height: 1.2;
        margin: 16px 0 20px;
        color: #0f172a;
    }

    .about-text p {
        color: #475569;
        line-height: 2;
        margin-bottom: 18px;
        font-size: 16px;
    }

    .about-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 32px;
        padding-top: 28px;
        border-top: 1px solid #e2e8f0;
    }

    .stat-item {
        text-align: center;
    }

    .stat-number {
        font-size: 32px;
        font-weight: 800;
        color: #dc2626;
    }

    .stat-label {
        font-size: 12px;
        color: #64748b;
        margin-top: 4px;
    }

    /* =====================
       FITUR
    ===================== */
    #fitur {
        background: #f8fafc;
        padding: 100px 0;
    }

    .fitur-title {
        text-align: center;
        margin-bottom: 60px;
        padding: 0 20px;
    }

    .fitur-title > span {
        color: #dc2626;
        font-weight: 700;
        letter-spacing: 3px;
        font-size: 12px;
    }

    .fitur-title h2 {
        font-size: 48px;
        color: #0f172a;
        margin: 12px 0;
    }

    .fitur-title p {
        color: #64748b;
        font-size: 17px;
    }

    .fitur-grid {
        width: 85%;
        margin: auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 28px;
    }

    .fitur-card {
        background: white;
        padding: 40px 30px;
        border-radius: 22px;
        text-align: center;
        box-shadow: 0 8px 24px rgba(0,0,0,0.07);
        transition: 0.3s;
        border: 1px solid #f1f5f9;
    }

    .fitur-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 16px 40px rgba(220,38,38,0.1);
        border-color: #fca5a5;
    }

    .fitur-icon {
        width: 80px;
        height: 80px;
        background: #fee2e2;
        color: #dc2626;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin: auto auto 22px;
        font-size: 36px;
    }

    .fitur-card h3 {
        font-size: 20px;
        margin-bottom: 12px;
        color: #0f172a;
    }

    .fitur-card p {
        color: #64748b;
        line-height: 1.8;
        font-size: 14px;
    }

    /* =====================
       PAKET
    ===================== */
    #paket {
        padding: 100px 0;
    }

    .paket-title {
        text-align: center;
        margin-bottom: 20px;
        padding: 0 20px;
    }

    .paket-title > span {
        color: #dc2626;
        font-weight: 700;
        letter-spacing: 3px;
        font-size: 12px;
    }

    .paket-title h2 {
        font-size: 48px;
        color: #0f172a;
        margin: 12px 0;
    }

    .paket-title p {
        color: #64748b;
        font-size: 17px;
        max-width: 560px;
        margin: 0 auto;
        line-height: 1.7;
    }

    /* fasilitas */
    .fasilitas-box {
        width: 85%;
        margin: 36px auto;
        background: white;
        border: 1px solid #f1f5f9;
        border-radius: 16px;
        padding: 24px 28px;
    }

    .fasilitas-label {
        font-size: 14px;
        font-weight: 600;
        color: #0f172a;
        margin: 0 0 16px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .fasilitas-label span {
        color: #dc2626;
        font-size: 18px;
    }

    .fasilitas-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
        gap: 8px 16px;
    }

    .fas-item {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: #475569;
        padding: 4px 0;
    }

    .fas-check {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #dcfce7;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 12px;
        color: #16a34a;
    }

    /* paket grid */
    .paket-grid {
        width: 85%;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 24px;
    }

    .paket-card {
        background: white;
        border: 1px solid #f1f5f9;
        border-radius: 16px;
        overflow: hidden;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .paket-card:hover {
        border-color: #fca5a5;
        box-shadow: 0 12px 30px rgba(220,38,38,0.1);
    }

    .paket-card.card-featured {
        border: 2px solid #dc2626;
    }

    .featured-badge {
        background: #dc2626;
        color: white;
        font-size: 12px;
        font-weight: 600;
        padding: 6px 16px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .card-img {
        width: 100%;
        height: 190px;
        object-fit: cover;
    }

    .card-body {
        padding: 18px 20px;
    }

    .card-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .badge-kategori {
        font-size: 11px;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 20px;
        background: #dbeafe;
        color: #1d4ed8;
    }

    .harga {
        font-size: 15px;
        font-weight: 700;
        color: #15803d;
    }

    .card-title {
        font-size: 15px;
        font-weight: 600;
        color: #0f172a;
        margin: 0 0 14px;
    }

    .meta {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 6px 12px;
        margin-bottom: 14px;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: #64748b;
    }

    .kuota-bar {
        background: #f1f5f9;
        border-radius: 4px;
        height: 4px;
        margin-bottom: 4px;
    }

    .kuota-fill {
        background: #dc2626;
        height: 4px;
        border-radius: 4px;
    }

    .kuota-label {
        font-size: 11px;
        color: #94a3b8;
        margin: 0 0 4px;
    }

    .divider {
        border: none;
        border-top: 1px solid #f1f5f9;
        margin: 14px 0;
    }

    .desc {
        font-size: 12px;
        color: #64748b;
        line-height: 1.6;
        margin: 0;
    }

    .semua-paket {
        text-align: center;
        margin-top: 40px;
    }

    .semua-paket a {
        display: inline-block;
        padding: 14px 36px;
        border: 2px solid #dc2626;
        color: #dc2626;
        text-decoration: none;
        border-radius: 12px;
        font-weight: 600;
        transition: 0.3s;
    }

    .semua-paket a:hover {
        background: #dc2626;
        color: white;
    }

    /* =====================
       KONTAK
    ===================== */
    #kontak {
        background: #0f172a;
        padding: 100px 0;
        color: white;
    }

    .kontak-inner {
        width: 85%;
        margin: auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 70px;
        align-items: center;
    }

    .kontak-info > span {
        color: #fca5a5;
        font-weight: 700;
        letter-spacing: 3px;
        font-size: 12px;
    }

    .kontak-info h2 {
        font-size: 48px;
        margin: 16px 0 20px;
        line-height: 1.2;
    }

    .kontak-info p {
        color: #94a3b8;
        line-height: 2;
        font-size: 15px;
        margin-bottom: 36px;
    }

    .kontak-channels {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .kontak-channel {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 16px 20px;
        background: rgba(255,255,255,0.05);
        border-radius: 12px;
        border: 1px solid rgba(255,255,255,0.08);
        text-decoration: none;
        transition: 0.2s;
    }

    .kontak-channel:hover {
        background: rgba(220,38,38,0.15);
        border-color: rgba(220,38,38,0.3);
    }

    .kontak-channel-icon {
        font-size: 24px;
    }

    .kontak-channel-text strong {
        display: block;
        color: white;
        font-size: 14px;
    }

    .kontak-channel-text small {
        color: #64748b;
        font-size: 12px;
    }

    /* form */
    .kontak-form {
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 20px;
        padding: 40px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        font-size: 13px;
        color: #94a3b8;
        margin-bottom: 8px;
        font-weight: 500;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px 16px;
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 10px;
        color: white;
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
        transition: 0.2s;
        outline: none;
    }

    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: #475569;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #dc2626;
        background: rgba(220,38,38,0.05);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 110px;
    }

    .form-btn {
        width: 100%;
        padding: 14px;
        background: #dc2626;
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 15px;
        font-weight: 600;
        font-family: 'Poppins', sans-serif;
        cursor: pointer;
        transition: 0.2s;
    }

    .form-btn:hover {
        background: #b91c1c;
    }

    /* =====================
       FOOTER
    ===================== */
    .footer {
        background: #020617;
        padding: 30px 0;
        text-align: center;
        color: #475569;
        font-size: 13px;
    }

    /* =====================
       RESPONSIVE
    ===================== */
    @media (max-width: 950px) {
        .navbar-onepage {
            padding: 16px 24px;
        }

        .nav-links {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            flex-direction: column;
            background: rgba(15,23,42,0.97);
            padding: 20px 24px;
            gap: 18px;
        }

        .nav-links.open {
            display: flex;
        }

        .nav-toggle {
            display: flex;
        }

        .hero-content h1 {
            font-size: 44px;
        }

        .hero-content p {
            font-size: 16px;
        }

        #tentang {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .about-text {
            text-align: center;
        }

        .about-text h2 {
            font-size: 36px;
        }

        .about-stats {
            grid-template-columns: repeat(3, 1fr);
        }

        .fitur-title h2,
        .paket-title h2,
        .kontak-info h2 {
            font-size: 36px;
        }

        .kontak-inner {
            grid-template-columns: 1fr;
            gap: 50px;
        }

        .fitur-grid,
        .paket-grid {
            width: 92%;
        }

        #tentang {
            width: 92%;
        }

        .fasilitas-box,
        .kontak-inner {
            width: 92%;
        }
    }

    @media (max-width: 480px) {
        .hero-content h1 {
            font-size: 32px;
        }

        .about-stats {
            grid-template-columns: 1fr;
        }

        .meta {
            grid-template-columns: 1fr;
        }

        .kontak-form {
            padding: 24px 20px;
        }
    }

</style>

{{-- ========= NAVBAR ========= --}}
<nav class="navbar-onepage" id="mainNav">
    <a href="#hero" class="nav-logo">Riyana<span>.</span></a>

    <ul class="nav-links" id="navLinks">
        <li><a href="#hero" class="active">Beranda</a></li>
        <li><a href="#tentang">Tentang Kami</a></li>
        <li><a href="#paket">Paket Umroh</a></li>
        <li><a href="#kontak" class="nav-cta">Hubungi Kami</a></li>
    </ul>

    <div class="nav-toggle" id="navToggle" onclick="toggleMenu()">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>

{{-- ========= HERO ========= --}}
<section id="hero" style="position:relative;">

    <div class="hero-content">

        <span>RIYANA TOUR & TRAVEL</span>

        <h1>
            Melayani Sepenuh Hati,
            Memberikan yang Terbaik
        </h1>

        <p>
            Ibadah nyaman dan aman bersama Riyana Tour & Travel
            dengan pelayanan profesional, fasilitas premium,
            dan perjalanan yang penuh kenyamanan.
        </p>

        <div class="hero-buttons">
            <a href="#paket" class="hero-btn">Lihat Paket Umroh</a>
            <a href="#tentang" class="hero-btn-outline">Tentang Kami</a>
        </div>

    </div>

    <div class="scroll-down">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 9l-7 7-7-7"/>
        </svg>
        scroll
    </div>

</section>

{{-- ========= TENTANG ========= --}}
<section id="tentang">

    <div class="about-image">
        <img src="{{ asset('storage/produk/makah.jpeg') }}" alt="Umroh Makkah">
    </div>

    <div class="about-text">

        <span>TENTANG RIYANA TOUR & TRAVEL</span>

        <h2>Kami Memberikan Pelayanan Terbaik</h2>

        <p>
            Riyana Tour & Travel adalah perusahaan travel profesional
            yang memberikan pelayanan ibadah umroh dengan fasilitas terbaik,
            hotel nyaman, pembimbing berpengalaman,
            dan perjalanan yang aman serta terpercaya.
        </p>

        <p>
            Dengan pengalaman dan pelayanan profesional,
            kami siap menjadi partner perjalanan ibadah terbaik Anda.
        </p>

        <div class="about-stats">
            <div class="stat-item">
                <div class="stat-number">500+</div>
                <div class="stat-label">Jamaah Diberangkatkan</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">10+</div>
                <div class="stat-label">Tahun Pengalaman</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">98%</div>
                <div class="stat-label">Kepuasan Jamaah</div>
            </div>
        </div>

    </div>

</section>

{{-- ========= FITUR ========= --}}
<section id="fitur">

    <div class="fitur-title">
        <span>KEUNGGULAN KAMI</span>
        <h2>Kenapa Memilih Kami?</h2>
        <p>Pelayanan profesional dan fasilitas terbaik untuk perjalanan ibadah Anda</p>
    </div>

    <div class="fitur-grid">

        <div class="fitur-card">
            <div class="fitur-icon">🕌</div>
            <h3>Ibadah Nyaman</h3>
            <p>Fasilitas lengkap dan pelayanan terbaik untuk kenyamanan ibadah.</p>
        </div>

        <div class="fitur-card">
            <div class="fitur-icon">✈️</div>
            <h3>Penerbangan Aman</h3>
            <p>Maskapai terpercaya dengan jadwal perjalanan yang teratur.</p>
        </div>

        <div class="fitur-card">
            <div class="fitur-icon">🏨</div>
            <h3>Hotel Berkualitas</h3>
            <p>Hotel nyaman dan strategis dekat lokasi ibadah utama.</p>
        </div>

        <div class="fitur-card">
            <div class="fitur-icon">🤝</div>
            <h3>Pembimbing Profesional</h3>
            <p>Didampingi tim berpengalaman selama perjalanan ibadah.</p>
        </div>

    </div>

</section>

{{-- ========= PAKET ========= --}}
<section id="paket">

    <div class="paket-title">
        <span>PILIHAN PAKET</span>
        <h2>Paket Umroh Kami</h2>
        <p>Berbagai pilihan paket umroh dengan fasilitas terbaik untuk kenyamanan ibadah Anda.</p>
    </div>

    {{-- Fasilitas --}}
    <div class="fasilitas-box">
        <div class="fasilitas-label">
            <span>🎁</span> Fasilitas yang didapatkan
        </div>
        <div class="fasilitas-grid">
            @foreach([
                'Tiket pesawat pulang pergi',
                'Hotel Makkah & Madinah',
                'Visa umroh',
                'Transportasi di Arab Saudi',
                'Makan 3x sehari',
                'Pembimbing berpengalaman',
                'Perlengkapan umroh',
                'Air zam-zam',
                'Asuransi perjalanan',
            ] as $item)
                <div class="fas-item">
                    <div class="fas-check">✓</div>
                    {{ $item }}
                </div>
            @endforeach
        </div>
    </div>

    {{-- Daftar Paket --}}
    <div class="paket-grid">

        @forelse($products as $product)
            @php
                $kuotaTerisi = $product->kuota - ($product->sisa_kuota ?? $product->kuota);
                $persenTerisi = $product->kuota > 0 ? ($kuotaTerisi / $product->kuota) * 100 : 0;
            @endphp

            <div class="paket-card">

                <img
                    src="{{ asset('storage/' . $product->gambar) }}"
                    alt="{{ $product->nama_produk }}"
                    class="card-img"
                >

                <div class="card-body">

                    <div class="card-top">
                        <span class="badge-kategori">{{ $product->category->nama ?? '-' }}</span>
                        <span class="harga">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                    </div>

                    <h3 class="card-title">{{ $product->nama_produk }}</h3>

                    <div class="meta">
                        <div class="meta-item">🏨 {{ $product->hotel }}</div>
                        <div class="meta-item">✈️ {{ $product->maskapai }}</div>
                        <div class="meta-item">📅 {{ \Carbon\Carbon::parse($product->tanggal_berangkat)->format('d M Y') }}</div>
                        <div class="meta-item">🕐 {{ $product->durasi }} Hari</div>
                    </div>

                    <div class="kuota-bar">
                        <div class="kuota-fill" style="width: {{ $persenTerisi }}%"></div>
                    </div>
                    <p class="kuota-label">{{ $product->sisa_kuota ?? $product->kuota }} dari {{ $product->kuota }} kuota tersisa</p>

                    <hr class="divider">

                    <p class="desc">{{ Str::limit($product->deskripsi, 120) }}</p>

                </div>
            </div>

        @empty
            <div style="grid-column:1/-1;text-align:center;padding:60px 0;color:#94a3b8;">
                <div style="font-size:40px;margin-bottom:12px;">📦</div>
                <p>Belum ada paket umroh tersedia.</p>
            </div>
        @endforelse

    </div>

    <div class="semua-paket">
        <a href="{{ route('produk.index') }}">Lihat Semua Paket →</a>
    </div>

</section>

{{-- ========= KONTAK ========= --}}
<section id="kontak">

    <div class="kontak-inner">

        <div class="kontak-info">

            <span>HUBUNGI KAMI</span>

            <h2>Siap Berangkat Umroh?</h2>

            <p>
                Konsultasikan kebutuhan ibadah Anda bersama tim kami.
                Kami siap membantu Anda menemukan paket terbaik.
            </p>

            <div class="kontak-channels">
                <a href="https://wa.me/6281234567890" target="_blank" class="kontak-channel">
                    <div class="kontak-channel-icon">📱</div>
                    <div class="kontak-channel-text">
                        <strong>WhatsApp</strong>
                        <small>+62 812-3456-7890</small>
                    </div>
                </a>
                <a href="mailto:info@riyanatour.com" class="kontak-channel">
                    <div class="kontak-channel-icon">📧</div>
                    <div class="kontak-channel-text">
                        <strong>Email</strong>
                        <small>info@riyanatour.com</small>
                    </div>
                </a>
                <a href="#" class="kontak-channel">
                    <div class="kontak-channel-icon">📍</div>
                    <div class="kontak-channel-text">
                        <strong>Kantor</strong>
                        <small>Jombang, Jawa Timur</small>
                    </div>
                </a>
            </div>

        </div>

        <div class="kontak-form">

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" placeholder="Masukkan nama Anda">
            </div>

            <div class="form-group">
                <label>Nomor WhatsApp</label>
                <input type="tel" placeholder="08xx-xxxx-xxxx">
            </div>

            <div class="form-group">
                <label>Paket yang diminati</label>
                <input type="text" placeholder="Contoh: Paket Umroh Reguler">
            </div>

            <div class="form-group">
                <label>Pesan</label>
                <textarea placeholder="Tulis pertanyaan atau pesan Anda..."></textarea>
            </div>

            <button class="form-btn">Kirim Pesan via WhatsApp</button>

        </div>

    </div>

</section>

{{-- ========= FOOTER ========= --}}
<footer class="footer">
    <p>© {{ date('Y') }} Riyana Tour & Travel. All rights reserved.</p>
</footer>

<script>
    // ── Navbar scroll effect ──
    const nav = document.getElementById('mainNav');
    window.addEventListener('scroll', () => {
        nav.classList.toggle('scrolled', window.scrollY > 50);
    });

    // ── Mobile menu toggle ──
    function toggleMenu() {
        document.getElementById('navLinks').classList.toggle('open');
    }

    // ── Close menu on link click ──
    document.querySelectorAll('#navLinks a').forEach(link => {
        link.addEventListener('click', () => {
            document.getElementById('navLinks').classList.remove('open');
        });
    });

    // ── Active link on scroll ──
    const sections = document.querySelectorAll('section[id]');
    const navItems = document.querySelectorAll('#navLinks a');

    window.addEventListener('scroll', () => {
        let current = '';
        sections.forEach(section => {
            if (window.scrollY >= section.offsetTop - 120) {
                current = section.getAttribute('id');
            }
        });

        navItems.forEach(a => {
            a.classList.remove('active');
            if (a.getAttribute('href') === '#' + current) {
                a.classList.add('active');
            }
        });
    });

    // ── WhatsApp form submit ──
    document.querySelector('.form-btn').addEventListener('click', () => {
        const nama   = document.querySelectorAll('.form-group input')[0].value;
        const wa     = document.querySelectorAll('.form-group input')[1].value;
        const paket  = document.querySelectorAll('.form-group input')[2].value;
        const pesan  = document.querySelector('.form-group textarea').value;

        const text = encodeURIComponent(
            `Halo Riyana Tour & Travel!\n\nNama: ${nama}\nWA: ${wa}\nPaket: ${paket}\nPesan: ${pesan}`
        );
        window.open(`https://wa.me/6281234567890?text=${text}`, '_blank');
    });
</script>

@endsection