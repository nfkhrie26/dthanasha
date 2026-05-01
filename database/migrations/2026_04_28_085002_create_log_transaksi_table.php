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
        Schema::create('log_transaksi', function (Blueprint $table) {
            // order_id WAJIB string karena Midtrans pake format string (misal: TRX-9921)
            $table->string('order_id')->primary(); 
            
            // Nullable karena satu transaksi nggak mungkin buat tagihan dan waiting list sekaligus
            $table->unsignedBigInteger('id_tagihan')->nullable();
            $table->unsignedBigInteger('id_waiting_list')->nullable();
            
            $table->string('snap_token')->nullable();
            $table->string('tipe_pembayaran')->nullable(); // Misal: 'Gopay', 'BCA VA'
            $table->string('status_transaksi'); // Misal: 'Pending', 'Settlement', 'Expire'
            $table->timestamps();

            // Relasi
            $table->foreign('id_tagihan')->references('id')->on('tagihan')->onDelete('set null');
            $table->foreign('id_waiting_list')->references('id')->on('waiting_list')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_transaksi');
    }
};
