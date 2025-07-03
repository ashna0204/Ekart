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
            $table->foreignId('childcategory_id')
                ->nullable()
                ->constrained('childcategories')
                ->onDelete('cascade')
                ->after('subcategory_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('products', function (Blueprint $table) {
                $table->dropForeign(['childcategory_id']);
                $table->dropColumn('childcategory_id');
        });
    }
};
