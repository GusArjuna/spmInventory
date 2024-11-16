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
        Schema::create('wagners', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->integer('periode1')->nullable();
            $table->integer('periode2')->nullable();
            $table->integer('periode3')->nullable();
            $table->integer('ww')->nullable();
            $table->timestamps();

            $table->foreign('nomor')->references('nomor')->on('suku_cadangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wagners');
    }
};
