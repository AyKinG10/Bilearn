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
        Schema::table('courses', function (Blueprint $table) {
            $table->foreignId('lesson_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();
        });
    }


    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign('courses_lesson_id_foreign');
            $table->dropColumn('lesson_id');
        });
    }
};
