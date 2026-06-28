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
    Schema::create('transaksi', function (Blueprint $table) {
        $table->id('id_transaksi');
        $table->unsignedBigInteger('id_tagihan');
        $table->unsignedBigInteger('id_bendahara'); // Nanti FK ke tabel users
        $table->dateTime('tanggal_bayar')->useCurrent();
        $table->decimal('nominal_bayar', 10, 2);
        $table->string('bukti_transfer')->nullable();
        $table->enum('status_verifikasi', ['pending', 'verified', 'rejected'])->default('pending');
        $table->timestamps();

        // Relasi ke tabel tagihan
        $table->foreign('id_tagihan')->references('id_tagihan')->on('tagihan')->onDelete('cascade');
        
        // Relasi ke tabel users (bendahara yang verifikasi)
        // Catatan: Tabel users bawaan Laravel primary key-nya bernama 'id', bukan 'id_user'
        $table->foreign('id_bendahara')->references('id_user')->on('users')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
