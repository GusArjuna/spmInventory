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
        Schema::create('laporan_peminjamen', function (Blueprint $table) {
            $table->id();
            $table->string('nomor')->unique();
            $table->string('nama');
            $table->string('peminjam'); 
            $table->integer('jumlah'); 
            $table->boolean('status'); 
            $table->date('tanggalPinjam');
            $table->date('tanggalKembali');
            $table->timestamps();

            $table->foreign('nama')->references('nomor')->on('alats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_peminjamen');
    }
};
