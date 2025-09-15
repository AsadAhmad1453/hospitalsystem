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
        Schema::table('medicines', function (Blueprint $table) {
            $table->string('generic_name')->nullable()->after('name');
            $table->string('manufacturer')->nullable()->after('generic_name');
            $table->string('category')->default('general')->after('manufacturer');
            $table->decimal('price', 10, 2)->default(0)->after('category');
            $table->integer('stock_quantity')->default(0)->after('price');
            $table->string('unit')->default('units')->after('stock_quantity');
            $table->integer('min_stock_level')->default(10)->after('unit');
            $table->date('expiry_date')->nullable()->after('min_stock_level');
            $table->string('batch_number')->nullable()->after('expiry_date');
            $table->text('description')->nullable()->after('batch_number');
            $table->text('side_effects')->nullable()->after('description');
            $table->text('dosage_instructions')->nullable()->after('side_effects');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medicines', function (Blueprint $table) {
            $table->dropColumn([
                'generic_name', 'manufacturer', 'category', 'price', 'stock_quantity',
                'unit', 'min_stock_level', 'expiry_date', 'batch_number', 'description',
                'side_effects', 'dosage_instructions'
            ]);
        });
    }
};
