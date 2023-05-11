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
        Schema::create('master-mobils', function (Blueprint $table) {
            $table->id();
            $table->string('tipe_mobil');
            $table->string('plat_nomor');
            $table->integer('bensin');
            $table->integer('jumlah');
            $table->string('status');
            $table->integer('jumlah_mobil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master-mobils');
    }
};
