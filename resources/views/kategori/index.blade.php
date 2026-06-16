@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold">
            Data Kategori
        </h2>

        @auth
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.kategori.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    + Tambah Kategori
                </a>
            @endif
        @endauth

    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="text-left py-3">
                        Nama
                    </th>

                    <th class="text-left py-3">
                        Deskripsi
                    </th>

                    @auth
                        @if(auth()->user()->role === 'admin')
                            <th class="text-center py-3">
                                Aksi
                            </th>
                        @endif
                    @endauth

                </tr>

            </thead>

            <tbody>

                @forelse($categories as $category)

                    <tr class="border-b">

                        <td class="py-4">
                            {{ $category->nama }}
                        </td>

                        <td>
                            {{ $category->deskripsi }}
                        </td>

                        @auth
                            @if(auth()->user()->role === 'admin')

                                <td class="text-center">

                                    <a href="{{ route('admin.kategori.edit', $category->id) }}"
                                       class="text-blue-600 mr-4 hover:underline">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.kategori.destroy', $category->id) }}"
                                          method="POST"
                                          class="inline"
                                          onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="text-red-600 hover:underline">
                                            Hapus
                                        </button>

                                    </form>

                                </td>

                            @endif
                        @endauth

                    </tr>

                @empty

                    <tr>

                        <td colspan="{{ auth()->check() && auth()->user()->role === 'admin' ? '3' : '2' }}"
                            class="text-center py-8 text-gray-500">

                            Data kategori belum tersedia.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection