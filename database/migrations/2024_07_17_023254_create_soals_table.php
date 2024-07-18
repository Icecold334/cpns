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
        Schema::create('soals', function (Blueprint $table) {
            $table->id();
            $table->foreignid('id_paket')->references('id')->on('pakets');
            $table->foreignid('id_kategori')->references('id')->on('kategoris');
            $table->string('gambar')->nullable();
            $table->string('soal');
            $table->string('a');
            $table->string('b');
            $table->string('c');
            $table->string('d');
            $table->string('e');
            $table->string('poin_a');
            $table->string('poin_b');
            $table->string('poin_c');
            $table->string('poin_d');
            $table->string('poin_e');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soals');
    }
};
