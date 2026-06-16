@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    <form action="{{ route('admin.kategori.update', $kategori->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-4">

            <label class="block mb-2">
                Nama Kategori
            </label>

            <input type="text"
                   name="name"
                   value="{{ $kategori->name }}"
                   class="w-full border rounded-lg p-3">

        </div>

        <div class="mb-6">

            <label class="block mb-2">
                Deskripsi
            </label>

            <textarea name="description"
                      rows="4"
                      class="w-full border rounded-lg p-3">{{ $kategori->description }}</textarea>

        </div>

        <button class="bg-blue-600 text-white px-6 py-3 rounded-lg">
            Update
        </button>

    </form>

</div>

@endsection