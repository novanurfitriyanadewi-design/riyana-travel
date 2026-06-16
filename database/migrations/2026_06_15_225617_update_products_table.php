<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
       public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {

            // $table->renameColumn('nama', 'nama_paket');

            // Tambah kolom baru
          //  $table->foreignId('category_id')
            //      ->nullable()
              //    ->after('id');

         //   $table->enum('jenis', ['umroh', 'haji'])
           //       ->default('umroh')
             //     ->after('nama_paket');

            $table->string('hotel')
                  ->nullable()
                  ->after('harga');

            $table->string('maskapai')
                  ->nullable()
                  ->after('hotel');

            $table->integer('kuota')
                  ->default(0)
                  ->after('maskapai');

            $table->date('tanggal_berangkat')
                  ->nullable()
                  ->after('kuota');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->renameColumn('nama_paket', 'nama');

            $table->dropColumn([
                'category_id',
                'jenis',
                'hotel',
                'maskapai',
                'kuota',
                'tanggal_berangkat'

                
            ]);
        });
    }
};