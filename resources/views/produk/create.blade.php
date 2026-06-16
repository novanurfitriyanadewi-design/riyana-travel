@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')

<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow mt-8">

    <h1 class="text-3xl font-bold mb-6">
        Tambah Paket Umroh / Haji
    </h1>

    <form action="{{ route('produk.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <!-- Kategori -->
        <div class="mb-4">
            <label class="block font-semibold mb-2">
                Kategori
            </label>

            <select name="category_id"
                    class="w-full border rounded-lg p-3"
                    required>

                <option value="">
                    -- Pilih Kategori --
                </option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->nama }}
                    </option>
                @endforeach

            </select>
        </div>

        <!-- Nama Paket -->
        <div class="mb-4">
            <label class="block font-semibold mb-2">
                Nama Paket
            </label>

            <input type="text"
                   name="nama_paket"
                   class="w-full border rounded-lg p-3"
                   required>
        </div>

        <!-- Jenis -->
        <div class="mb-4">
            <label class="block font-semibold mb-2">
                Jenis
            </label>

            <select name="jenis"
                    class="w-full border rounded-lg p-3"
                    required>

                <option value="umroh">
                    Umroh
                </option>

                <option value="haji">
                    Haji
                </option>

            </select>
        </div>

        <!-- Durasi -->
        <div class="mb-4">
            <label class="block font-semibold mb-2">
                Durasi (Hari)
            </label>

            <input type="number"
                   name="durasi"
                   class="w-full border rounded-lg p-3"
                   required>
        </div>

        <!-- Harga -->
        <div class="mb-4">
            <label class="block font-semibold mb-2">
                Harga
            </label>

            <input type="number"
                   name="harga"
                   class="w-full border rounded-lg p-3"
                   required>
        </div>

        <!-- Hotel -->
        <div class="mb-4">
            <label class="block font-semibold mb-2">
                Hotel
            </label>

            <input type="text"
                   name="hotel"
                   class="w-full border rounded-lg p-3">
        </div>

        <!-- Maskapai -->
        <div class="mb-4">
            <label class="block font-semibold mb-2">
                Maskapai
            </label>

            <input type="text"
                   name="maskapai"
                   class="w-full border rounded-lg p-3">
        </div>

        <!-- Kuota -->
        <div class="mb-4">
            <label class="block font-semibold mb-2">
                Kuota
            </label>

            <input type="number"
                   name="kuota"
                   class="w-full border rounded-lg p-3"
                   required>
        </div>

        <!-- Tanggal Berangkat -->
        <div class="mb-4">
            <label class="block font-semibold mb-2">
                Tanggal Berangkat
            </label>

            <input type="date"
                   name="tanggal_berangkat"
                   class="w-full border rounded-lg p-3"
                   required>
        </div>

        <!-- Deskripsi -->
        <div class="mb-4">
            <label class="block font-semibold mb-2">
                Deskripsi
            </label>

            <textarea name="deskripsi"
                      rows="5"
                      class="w-full border rounded-lg p-3"
                      required></textarea>
        </div>

        <!-- Gambar -->
        <div class="mb-6">
            <label class="block font-semibold mb-2">
                Gambar Paket
            </label>

            <input type="file"
                   name="gambar"
                   class="w-full border rounded-lg p-3">
        </div>

        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

            Simpan Produk

        </button>

        <a href="{{ route('produk.index') }}"
           class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg ml-2">

            Kembali

        </a>

    </form>

</div>

@endsection