<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'category_id' => 1,
            'nama_paket' => 'Umroh Gold 14 Hari',
            'jenis' => 'umroh',
            'durasi' => 14,
            'harga' => 45000000,
            'hotel' => 'Swissotel Makkah',
            'maskapai' => 'Qatar Airways',
            'kuota' => 45,
            'tanggal_berangkat' => '2026-09-15',
            'deskripsi' => 'Paket VVIP dengan hotel bintang 5 dekat Masjidil Haram dan pembimbing profesional.',
            'gambar' => 'produk/umroh1.jpg'
        ]);

        Product::create([
            'category_id' => 1,
            'nama_paket' => 'Haji Gold Plus',
            'jenis' => 'haji',
            'durasi' => 25,
            'harga' => 185000000,
            'hotel' => 'Fairmont Makkah',
            'maskapai' => 'Emirates',
            'kuota' => 30,
            'tanggal_berangkat' => '2027-05-20',
            'deskripsi' => 'Paket haji premium dengan fasilitas VIP dan transportasi eksklusif.',
            'gambar' => 'produk/haji1.jpg'
        ]);

        Product::create([
            'category_id' => 2,
            'nama_paket' => 'Umroh Silver 12 Hari',
            'jenis' => 'umroh',
            'durasi' => 12,
            'harga' => 32000000,
            'hotel' => 'Al Kiswah Tower',
            'maskapai' => 'Saudia Airlines',
            'kuota' => 45,
            'tanggal_berangkat' => '2026-10-10',
            'deskripsi' => 'Paket reguler dengan hotel nyaman dan pembimbing berpengalaman.',
            'gambar' => 'produk/umroh2.jpg'
        ]);

        Product::create([
            'category_id' => 2,
            'nama_paket' => 'Haji Silver Reguler',
            'jenis' => 'haji',
            'durasi' => 40,
            'harga' => 95000000,
            'hotel' => 'Emaar Grand Hotel',
            'maskapai' => 'Garuda Indonesia',
            'kuota' => 45,
            'tanggal_berangkat' => '2027-06-01',
            'deskripsi' => 'Paket haji reguler dengan fasilitas lengkap dan pelayanan profesional.',
            'gambar' => 'produk/haji2.jpg'
        ]);

        Product::create([
            'category_id' => 3,
            'nama_paket' => 'Umroh Bronze 9 Hari',
            'jenis' => 'umroh',
            'durasi' => 9,
            'harga' => 26500000,
            'hotel' => 'Dar Al Eiman',
            'maskapai' => 'Lion Air + Saudia',
            'kuota' => 45,
            'tanggal_berangkat' => '2026-11-15',
            'deskripsi' => 'Paket ekonomis yang nyaman dan terjangkau.',
            'gambar' => 'produk/umroh3.jpg'
        ]);

        Product::create([
            'category_id' => 3,
            'nama_paket' => 'Haji Bronze',
            'jenis' => 'haji',
            'durasi' => 40,
            'harga' => 75000000,
            'hotel' => 'Area Aziziyah',
            'maskapai' => 'Garuda Indonesia',
            'kuota' => 45,
            'tanggal_berangkat' => '2027-06-10',
            'deskripsi' => 'Paket haji hemat dengan pendampingan ibadah optimal.',
            'gambar' => 'produk/makah.jpeg'
        ]);
    }
}