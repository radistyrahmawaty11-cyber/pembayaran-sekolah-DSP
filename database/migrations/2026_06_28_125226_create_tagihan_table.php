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
        $table->id('id_tagihan');
        $table->string('nisn', 20);
        $table->unsignedBigInteger('id_jenis');
        $table->tinyInteger('bulan');
        $table->year('tahun');
        $table->decimal('jumlah', 10, 2);
        $table->enum('status', ['belum_lunas', 'lunas', 'menunggu_verifikasi'])->default('belum_lunas');
        $table->date('jatuh_tempo');
        
        // Field untuk QRIS
        $table->text('qr_string')->nullable();
        $table->string('order_id', 100)->nullable();
        $table->dateTime('paid_at')->nullable();
        $table->string('payment_channel', 50)->nullable();
        
        $table->timestamps();

        // Relasi ke tabel siswa dan jenis_pembayaran
        $table->foreign('nisn')->references('nisn')->on('siswa')->onDelete('cascade');
        $table->foreign('id_jenis')->references('id_jenis')->on('jenis_pembayaran')->onDelete('cascade');
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
