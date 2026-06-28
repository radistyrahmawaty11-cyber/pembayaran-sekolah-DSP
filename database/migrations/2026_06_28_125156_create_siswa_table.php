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
    Schema::create('siswa', function (Blueprint $table) {
        $table->string('nisn', 20)->primary();
        $table->string('nama_lengkap', 100);
        $table->unsignedBigInteger('id_kelas');
        $table->text('alamat')->nullable();
        $table->string('no_hp', 15)->nullable();
        $table->string('email', 100)->nullable();
        $table->timestamps();

        // Ini untuk menghubungkan ke tabel kelas
        $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onDelete('cascade');
    });
}       

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
