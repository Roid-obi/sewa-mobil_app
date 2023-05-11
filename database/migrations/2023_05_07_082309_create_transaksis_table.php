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
            $table->string('nama-peminjam');
            $table->string('tipe-mobil');
            $table->string('Sopir');
            $table->integer('total-pembayaran');
            $table->string('bukti-pengembalian')->nullable();
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
