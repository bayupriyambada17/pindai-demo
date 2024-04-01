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
        Schema::create('research', function (Blueprint $table) {
            $table->id()->index();
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId('dosen_id')->constrained('users')->onDelete('cascade');
            $table->string('status');
            $table->enum('dana', ['DiDanai', 'Tidak Didanai']);
            $table->enum('type_riset', ['Pengabdian', 'Penelitian']);
            $table->foreignId('tahun_akademik_id')->constrained('tahun_akademik')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_models');
    }
};
