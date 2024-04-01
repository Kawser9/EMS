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
        Schema::table('products', function (Blueprint $table) {
            $table->string('frontImage')->nullable();
            $table->string('sideImage')->nullable();
            $table->double('total')->nullable();
            $table->double('opening_value')->nullable();
            $table->double('reOrder_quantity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('total');
            $table->dropColumn('frontImage');
            $table->dropColumn('sideImage');
            $table->dropColumn('opening_value');
            $table->dropColumn('reOrder_quantity');
        });
    }
};
