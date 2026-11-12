<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penarikan_saldo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nasabah_id')->constrained('nasabah');
            $table->foreignId('petugas_id')->nullable()->constrained('users');
            $table->foreignId('bank_ewallet_id')->constrained('bank_ewallet');
            $table->string('nomor_rekening_tujuan', 30);
            $table->string('name_pemilik', 100);
            $table->decimal('nominal', 15, 2);
            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');
            $table->text('catatan')->nullable();
            $table->timestamp('tanggal_request')->useCurrent();
            $table->timestamp('tanggal_proses')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penarikan_saldo');
    }
};
