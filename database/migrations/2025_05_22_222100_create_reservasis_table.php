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
       Schema::create('reservasis', function (Blueprint $table) {
    $table->id();
    $table->string('nama');
    $table->string('nik');
    $table->string('telepon');
    $table->date('tanggal_lahir');
    $table->date('jadwal_pemeriksaan');
    $table->string('jenis_pemeriksaan');
    $table->string('detail_pemeriksaan');
    $table->enum('rujukan', ['ya', 'tidak']);
    $table->string('surat_rujukan')->nullable();
    $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
    $table->string('hasil_pemeriksaan')->nullable();
    $table->timestamps();
    $table->string('jenis_kelamin')->nullable();
    $table->string('alamat')->nullable();
    $table->decimal('harga', 10, 2)->default(0);
    $table->string('status')->default('Menunggu Pembayaran');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};
