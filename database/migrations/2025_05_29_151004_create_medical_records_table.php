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
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('blood_pressure')->nullable();
            $table->string('heart_rate')->nullable();
            $table->string('final_diagnosis')->nullable();
            $table->string('recommended_medication')->nullable();
            $table->string('further_investigation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_records');
        dropcolumn('medical_records', 'weight');
        dropcolumn('medical_records', 'height');
        dropcolumn('medical_records', 'blood_pressure');
        dropcolumn('medical_records', 'heart_rate');
        dropcolumn('medical_records', 'final_diagnosis');
        dropcolumn('medical_records', 'recommended_medication');
        dropcolumn('medical_records', 'further_investigation');
    }
};
