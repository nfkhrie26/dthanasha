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
        Schema::table('penghuni', function (Blueprint $table) {
            // Menambahkan kolom kamar_id (boleh kosong/nullable jika penghuni belum punya kamar)
            $table->unsignedBigInteger('kamar_id')->nullable()->after('id');

            // Menyambungkan relasi foreign key ke tabel kamar
            $table->foreign('kamar_id')->references('id')->on('kamar')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penghuni', function (Blueprint $table) {
            // Menghapus foreign key dan kolom jika di-rollback
            $table->dropForeign(['kamar_id']);
            $table->dropColumn('kamar_id');
        });
    }
};