<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('setoran_id')->nullable()->constrained('setoran');
            $table->foreignId('penarikan_id')->nullable()->constrained('penarikan_saldo');
            $table->enum('tipe', ['request_penarikan', 'setoran_selesai', 'penarikan_disetujui', 'penarikan_ditolak', 'penarikan_dibayar']);
            $table->string('judul', 150);
            $table->text('pesan');
            $table->boolean('is_read')->default(false);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifikasi');
    }
};
