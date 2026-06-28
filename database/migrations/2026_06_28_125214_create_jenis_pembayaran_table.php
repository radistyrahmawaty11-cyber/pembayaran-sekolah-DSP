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
    Schema::create('jenis_pembayaran', function (Blueprint $table) {
        $table->id('id_jenis');
        $table->string('nama_pembayaran', 100);
        $table->decimal('nominal', 10, 2);
        $table->text('keterangan')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_pembayaran');
    }
};
