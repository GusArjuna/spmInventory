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
        Schema::create('laporan_kerusakans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor')->unique();
            $table->string('nama');
            $table->string('teknisi'); 
            $table->boolean('status'); 
            $table->integer('jumlah'); 
            $table->date('tanggalLapor');
            $table->date('tanggalSelesai')->nullable();
            $table->timestamps();

            $table->foreign('nama')->references('nomor')->on('alats')->onDelete('cascade');
            $table->foreign('teknisi')->references('nomor')->on('teknisis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_kerusakans');
    }
};
