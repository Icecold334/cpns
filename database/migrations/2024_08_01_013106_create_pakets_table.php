<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Testing\Fakes\Fake;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pakets', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->default();
            $table->string('nama');
            $table->integer('durasi');
            $table->boolean('status')->default(false);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('base_id')->constrained('base_kategoris');
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
