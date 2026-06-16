<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'nama' => 'Gold',
            'deskripsi' => 'Paket VVIP dengan fasilitas premium'
        ]);

        Category::create([
            'nama' => 'Silver',
            'deskripsi' => 'Paket reguler dengan fasilitas lengkap'
        ]);

        Category::create([
            'nama' => 'Bronze',
            'deskripsi' => 'Paket hemat dengan harga terjangkau'
        ]);
    }
}