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
        Schema::create('laporan_pembelians', function (Blueprint $table) {
            $table->id();
            $table->string('nomor')->unique();
            $table->string('nama');
            $table->integer('jumlah'); 
            $table->date('tanggal');
            $table->timestamps();

            $table->foreign('nama')->references('nomor')->on('suku_cadangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_pembelians');
    }
};
