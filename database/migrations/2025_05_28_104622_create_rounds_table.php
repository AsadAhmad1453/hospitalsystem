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
        Schema::create('rounds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->integer('visit_number');
            $table->enum('nursing_status', ['0', '1'])->default('0');
            $table->enum('doctor_status', ['0', '1'])->default('0');
            $table->enum('pharmacist_status', ['0', '1'])->default('0');
            $table->enum('physiotherapist_status', ['0', '1'])->default('0');
            $table->enum('psychologist_status', ['0', '1'])->default('0');
            $table->enum('nutritionist_status', ['0', '1'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rounds');
    }
};
