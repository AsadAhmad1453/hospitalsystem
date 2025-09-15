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
        Schema::table('blood_investigation', function (Blueprint $table) {
            $table->string('test_name')->nullable()->after('name');
            $table->string('test_type')->nullable()->after('test_name');
            $table->string('test_code')->nullable()->after('test_type');
            $table->string('priority')->default('normal')->after('test_code');
            $table->text('description')->nullable()->after('priority');
            $table->datetime('expected_date')->nullable()->after('description');
            $table->decimal('cost', 10, 2)->nullable()->after('expected_date');
            $table->unsignedBigInteger('patient_id')->nullable()->after('cost');
            $table->unsignedBigInteger('doctor_id')->nullable()->after('patient_id');
            $table->string('status')->default('pending')->after('doctor_id');
            $table->boolean('is_abnormal')->default(false)->after('status');
            $table->text('results')->nullable()->after('is_abnormal');
            $table->text('interpretation')->nullable()->after('results');
            $table->text('recommendations')->nullable()->after('interpretation');
            
            // Add foreign key constraints
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blood_investigation', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);
            $table->dropForeign(['doctor_id']);
            $table->dropColumn([
                'test_name', 'test_type', 'test_code', 'priority', 'description',
                'expected_date', 'cost', 'patient_id', 'doctor_id', 'status',
                'is_abnormal', 'results', 'interpretation', 'recommendations'
            ]);
        });
    }
};
