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
        Schema::create('pakets', function (Blueprint $table) {
    $table->id();
    $table->foreignId('destinasi_id')->constrained('destinasis')->cascadeOnDelete();
    $table->string('nama_paket');
    $table->string('durasi');
    $table->decimal('harga', 10, 2);
    $table->text('deskripsi');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakets');
    }
};
