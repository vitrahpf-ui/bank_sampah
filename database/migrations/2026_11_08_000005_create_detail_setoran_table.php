<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_setoran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('setoran_id')->constrained('setoran');
            $table->foreignId('kategori_id')->constrained('kategori_sampah');
            $table->foreignId('harga_sampah_id')->constrained('harga_sampah');
            $table->decimal('berat', 10, 2);
            $table->decimal('harga_saat_setor', 12, 2);
            $table->decimal('subtotal', 15, 2);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_setoran');
    }
};
