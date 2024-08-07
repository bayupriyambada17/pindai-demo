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
            $table->foreignId('lecturer_id')->constrained('users')->onDelete('cascade');
            $table->enum('funding', ['mandiri', 'hibah']);
            $table->enum('type_research', ['penelitian', 'pengabdian'])->comment('Penelitian, Pengabdian');
            $table->enum('semesters', ['ganjil', 'genap']);
            $table->foreignId('academic_year_id')->constrained('academic_year')->onDelete('cascade');
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
