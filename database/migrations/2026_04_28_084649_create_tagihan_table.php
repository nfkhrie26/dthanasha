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
        Schema::create('tagihan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_penghuni');
            
            $table->string('periode_bulan'); // Misal: 'Januari 2026'
            $table->string('status_tagihan'); // Misal: 'Lunas', 'menunggu konfirmasi', 'Belum Lunas'
            $table->integer('nominal_tagihan');
            $table->date('tanggal_bayar')->nullable();
            $table->date('jatuh_tempo');
            $table->string('bukti_transfer')->nullable(); // Buat fallback pembayaran manual
            $table->timestamps();

            // Relasi
            $table->foreign('id_penghuni')->references('id')->on('penghuni')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan');
    }
};
