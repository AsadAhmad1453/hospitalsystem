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
        Schema::create('form_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_id');
            $table->unsignedBigInteger('section_id');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('question_sections')->onDelete('cascade');
            $table->unique(['form_id', 'section_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_sections');
    }
};
