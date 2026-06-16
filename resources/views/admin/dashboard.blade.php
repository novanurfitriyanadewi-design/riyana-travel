@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="grid md:grid-cols-3 gap-6">

    <div class="bg-white rounded-2xl p-6 shadow">

        <p class="text-gray-500">Total Kategori</p>

        <h3 class="text-4xl font-bold mt-2">
            {{ $totalKategori }}
        </h3>

    </div>

    <div class="bg-white rounded-2xl p-6 shadow">

        <p class="text-gray-500">Total Paket</p>

        <h3 class="text-4xl font-bold mt-2">
            {{ $totalProduk }}
        </h3>

    </div>

    <div class="bg-white rounded-2xl p-6 shadow">

        <p class="text-gray-500">Total User</p>

        <h3 class="text-4xl font-bold mt-2">
            {{ $totalUser }}
        </h3>

    </div>

</div>

@endsection