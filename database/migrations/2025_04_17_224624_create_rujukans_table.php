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
        Schema::create('rujukans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('alamat');
            $table->date('tanggal_lahir');
            $table->string('nik');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->date('jadwal_pemeriksaan');
            $table->string('jenis_pemeriksaan');
            $table->text('detail_pemeriksaan');
            $table->string('no_telepon');
            $table->text('catatan_dokter')->nullable();
            $table->string('file_rujukan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rujukans');
    }
};
