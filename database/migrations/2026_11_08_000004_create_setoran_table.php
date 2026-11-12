<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('setoran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nasabah_id')->constrained('nasabah');
            $table->foreignId('petugas_id')->constrained('users');
            $table->timestamp('tanggal_setor')->useCurrent();
            $table->decimal('total_berat', 10, 2)->default(0);
            $table->decimal('total_nilai', 15, 2)->default(0);
            $table->text('catatan')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('setoran');
    }
};
