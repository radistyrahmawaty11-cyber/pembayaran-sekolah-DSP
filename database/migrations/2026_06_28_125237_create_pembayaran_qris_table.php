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
    Schema::create('pembayaran_qris', function (Blueprint $table) {
        $table->id('id_pembayaran');
        $table->unsignedBigInteger('id_tagihan');
        $table->string('merchant_ref', 100)->unique();
        $table->string('qr_code_url')->nullable();
        $table->dateTime('expired_time');
        $table->enum('payment_status', ['pending', 'success', 'failed', 'expired'])->default('pending');
        $table->dateTime('callback_received_at')->nullable();
        $table->timestamps();

        // Relasi ke tabel tagihan
        $table->foreign('id_tagihan')->references('id_tagihan')->on('tagihan')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_qris');
    }
};
