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
        Schema::create('riwayats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservasi_id')->nullable()->constrained('reservasis')->after('id');
            $table->string('harga');
            $table->string('status_pembayaran')->default('Belum Dibayar');
            $table->string('invoice_number')->unique();
            $table->string('hasil_pemeriksaan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
