@extends('layouts.admin')

@section('title', 'Produk Umroh')

@section('content')

<style>
    .produk-section{
        width:100%;
    }

    .produk-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:30px;
        flex-wrap:wrap;
        gap:20px;
    }

    .produk-title h1{
        font-size:32px;
        color:#0f172a;
        margin-bottom:8px;
    }

    .produk-title p{
        color:#64748b;
    }

    .btn-tambah{
        background:#dc2626;
        color:white;
        text-decoration:none;
        padding:12px 20px;
        border-radius:12px;
        font-weight:600;
    }

    .btn-tambah:hover{
        background:#b91c1c;
    }

    .search-box{
        background:white;
        padding:20px;
        border-radius:16px;
        margin-bottom:30px;
        box-shadow:0 4px 15px rgba(0,0,0,0.05);
    }

    .search-form{
        display:flex;
        gap:12px;
    }

    .search-input{
        flex:1;
        padding:14px;
        border:1px solid #cbd5e1;
        border-radius:12px;
        outline:none;
    }

    .search-btn{
        background:#0f172a;
        color:white;
        border:none;
        padding:14px 25px;
        border-radius:12px;
        cursor:pointer;
    }

    .alert-success{
        background:#dcfce7;
        color:#166534;
        padding:15px;
        border-radius:12px;
        margin-bottom:25px;
    }

    .produk-grid{
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
        gap:25px;
    }

    .produk-card{
        background:white;
        border-radius:20px;
        overflow:hidden;
        box-shadow:0 6px 20px rgba(0,0,0,0.08);
    }

    .produk-image{
        width:100%;
        height:230px;
        object-fit:cover;
    }

    .produk-content{
        padding:25px;
    }

    .produk-content h2{
        font-size:24px;
        margin-bottom:10px;
        color:#0f172a;
    }

    .harga{
        color:#dc2626;
        font-size:24px;
        font-weight:700;
        margin-bottom:10px;
    }

    .durasi{
        color:#475569;
        margin-bottom:10px;
    }

    .kategori{
        display:inline-block;
        background:#e2e8f0;
        color:#334155;
        padding:6px 12px;
        border-radius:999px;
        font-size:14px;
        margin-bottom:15px;
    }

    .deskripsi{
        color:#64748b;
        line-height:1.7;
        margin-bottom:20px;
    }

    .button-group{
        display:flex;
        gap:10px;
    }

    .button-group form{
        flex:1;
    }

    .btn-edit,
    .btn-hapus,
    .btn-pesan{
        width:100%;
        display:block;
        text-align:center;
        padding:12px;
        border-radius:10px;
        text-decoration:none;
        font-weight:600;
    }

    .btn-edit{
        background:#f59e0b;
        color:white;
    }

    .btn-hapus{
        background:#dc2626;
        color:white;
        border:none;
        cursor:pointer;
    }

    .btn-pesan{
        background:#16a34a;
        color:white;
    }

    .empty{
        text-align:center;
        padding:50px;
        color:#64748b;
    }

    .pagination-box{
        margin-top:40px;
    }

    @media(max-width:768px){

        .search-form{
            flex-direction:column;
        }

        .button-group{
            flex-direction:column;
        }
    }
</style>

<div class="produk-section">

    <div class="produk-header">

        <div class="produk-title">
            <h1>Paket Umroh</h1>
            <p>Pilihan paket umroh terbaik untuk perjalanan ibadah Anda.</p>
        </div>

        @auth
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.produk.create') }}" class="btn-tambah">
                    + Tambah Paket
                </a>
            @endif
        @endauth

    </div>

    <div class="search-box">

        <form action="{{ route('produk.index') }}" method="GET" class="search-form">

            <input
                type="text"
                name="q"
                value="{{ request('q') }}"
                placeholder="Cari paket umroh..."
                class="search-input">

            <button type="submit" class="search-btn">
                Cari
            </button>

        </form>

    </div>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="produk-grid">

        @forelse($data as $p)

            <div class="produk-card">

                <img
                    src="{{ asset('storage/' . $p->gambar) }}"
                    alt="{{ $p->nama_paket }}"
                    class="produk-image">

                <div class="produk-content">

                    <h2>{{ $p->nama_paket }}</h2>

                    <div class="harga">
                        Rp {{ number_format($p->harga, 0, ',', '.') }}
                    </div>

                    <div class="durasi">
                        Durasi: {{ $p->durasi }}
                    </div>

                    @if($p->category)
                        <div class="kategori">
                            {{ $p->category->nama }}
                        </div>
                    @endif

                    <div class="deskripsi">
                        {{ Str::limit($p->deskripsi, 120) }}
                    </div>

                    <div class="button-group">

                        @auth

                            @if(auth()->user()->role === 'admin')

                                <a href="{{ route('admin.produk.edit', $p->id) }}"
                                   class="btn-edit">
                                    Edit
                                </a>

                                <form action="{{ route('admin.produk.destroy', $p->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Hapus data ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn-hapus">
                                        Hapus
                                    </button>

                                </form>

                            @else

                                <a href="{{ route('produk.show', $p->id) }}"
                                   class="btn-pesan">
                                    Pesan Sekarang
                                </a>

                            @endif

                        @else

                            <a href="{{ route('login') }}"
                               class="btn-pesan">
                                Login untuk Memesan
                            </a>

                        @endauth

                    </div>

                </div>

            </div>

        @empty

            <div class="empty">
                Data paket umroh belum tersedia.
            </div>

        @endforelse

    </div>

    <div class="pagination-box">
        {{ $data->links() }}
    </div>

</div>

@endsection