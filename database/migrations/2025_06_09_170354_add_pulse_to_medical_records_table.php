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
        Schema::table('medical_records', function (Blueprint $table) {
            $table->integer('pulse')->after('blood_pressure')->nullable();
            $table->integer('systolic_blood_pressure')->after('pulse')->nullable();
            $table->integer('diasystolic_blood_pressure')->after('systolic_blood_pressure')->nullable();
            $table->integer('temperature')->after('diasystolic_blood_pressure')->nullable();
            $table->integer('weather')->after('temperature')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medical_records', function (Blueprint $table) {
            dropcolumn('pulse');
            dropcolumn('systolic_blood_pressure');
            dropcolumn('diasystolic_blood_pressure');
            dropcolumn('temperature');
            dropcolumn('weather');
        });
    }
};
