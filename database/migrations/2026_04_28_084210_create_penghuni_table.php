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
        Schema::create('penghuni', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users')->nullable();
            $table->unsignedBigInteger('id_kamar')->nullable();
            
            $table->string('nama_penghuni');
            $table->integer('usia');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('no_telepon');
            $table->string('no_telepon_orangtua');
            $table->timestamps();

            // Relasi Foreign Key
            $table->foreign('id_user')->references('id')->on('users')->onDelete('set null');
            $table->foreign('id_kamar')->references('id')->on('kamar')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penghuni');
    }
};
