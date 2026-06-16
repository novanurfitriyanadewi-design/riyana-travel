@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    <form action="{{ route('admin.kategori.store') }}"
          method="POST">

        @csrf

        <div class="mb-4">

            <label class="block mb-2">
                Nama Kategori
            </label>

            <input type="text"
                   name="name"
                   class="w-full border rounded-lg p-3">

        </div>

        <div class="mb-6">

            <label class="block mb-2">
                Deskripsi
            </label>

            <textarea name="description"
                      rows="4"
                      class="w-full border rounded-lg p-3"></textarea>

        </div>

        <button class="bg-blue-600 text-white px-6 py-3 rounded-lg">
            Simpan
        </button>

    </form>

</div>

@endsection