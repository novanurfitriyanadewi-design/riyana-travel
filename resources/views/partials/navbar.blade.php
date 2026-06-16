<!-- NAVBAR -->
<nav class="navbar">
    <div class="navbar-container">

        <!-- LOGO -->
        <div class="logo">
            Riyana Travel
        </div>

        <!-- MENU -->
        <div class="menu">
            <a href="#home">Home</a>
            <a href="#paket">Paket Umroh</a>
            <a href="#tentang">Tentang</a>
            <a href="#kontak">Kontak</a>
        </div>

        <!-- BUTTON LOGIN -->
        @auth
            <a href="{{ auth()->user()->role === 'admin'
                        ? route('admin.dashboard')
                        : route('produk.index') }}"
               class="nav-btn">
                Dashboard
            </a>
        @else
            <a href="{{ route('login') }}" class="nav-btn">
                Login
            </a>
        @endauth

    </div>
</nav>

<style>
    .navbar {
        width: 100%;
        background: white;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 9999;
        padding: 20px 8%;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    }

    .navbar-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    .logo {
        font-size: 32px;
        font-weight: 800;
        color: #0f172a;
    }

    .menu {
        display: flex;
        gap: 35px;
    }

    .menu a {
        text-decoration: none;
        color: #334155;
        font-weight: 600;
        transition: 0.3s;
    }

    .menu a:hover {
        color: #dc2626;
    }

    .nav-btn {
        background: #dc2626;
        color: white;
        text-decoration: none;
        padding: 14px 32px;
        border-radius: 12px;
        font-weight: 600;
        transition: 0.3s;
    }

    .nav-btn:hover {
        background: #b91c1c;
    }

    @media(max-width:900px) {
        .navbar-container {
            flex-direction: column;
        }

        .menu {
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
    }

    /* Smooth scroll */
    html {
        scroll-behavior: smooth;
    }
</style>
