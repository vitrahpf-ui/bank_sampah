<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bank_ewallet', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->enum('jenis', ['bank', 'ewallet']);
            $table->boolean('is_active')->default(true);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bank_ewallet');
    }
};
