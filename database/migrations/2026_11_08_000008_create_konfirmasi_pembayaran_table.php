<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('konfirmasi_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penarikan_id')->unique()->constrained('penarikan_saldo');
            $table->foreignId('petugas_id')->constrained('users');
            $table->string('foto_bukti');
            $table->text('catatan')->nullable();
            $table->timestamp('dibayar_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('konfirmasi_pembayaran');
    }
};
