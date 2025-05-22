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
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->text('alamat');
            $table->string('nik', 16);
            $table->string('telepon');
            $table->date('tanggal_lahir');
            $table->date('jadwal_pemeriksaan');
            $table->string('jenis_pemeriksaan');
            $table->string('detail_pemeriksaan');
            $table->enum('punya_rujukan', ['Ya', 'Tidak']);
            $table->string('surat_rujukan_path')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->enum('status', ['Menunggu', 'Dikonfirmasi', 'Selesai', 'Dibatalkan'])->default('Menunggu');
            $table->timestamps();
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
