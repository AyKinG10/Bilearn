<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->foreignId('category_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();
        });
    }
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign('courses_category_id_foreign');
            $table->dropColumn('category_id');
        });
    }
};
