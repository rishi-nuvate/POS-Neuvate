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
        Schema::table('brands', function(Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('seasons', function(Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('tags', function(Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('category_masters', function(Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('sub_category_masters', function(Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brands', function($table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('seasons', function($table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('tags', function($table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('category_masters', function($table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('sub_category_masters', function($table) {
            $table->dropColumn('deleted_at');
        });
    }
};
