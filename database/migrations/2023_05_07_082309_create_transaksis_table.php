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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam');
            $table->string('tipe_mobil');
            $table->string('Sopir');
            $table->integer('total_pembayaran');
            $table->string('bukti_pengembalian')->nullable();
            $table->string('status'); //pesanan baru/dalam peminjaman/pengembalian /jika statusnya pengembalian maka wajib di isi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
