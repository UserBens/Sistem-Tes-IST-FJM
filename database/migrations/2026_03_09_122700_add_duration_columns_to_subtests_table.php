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
        Schema::table('subtests', function (Blueprint $table) {
            $table->integer('instruction_duration')->after('subtest_name');
            $table->integer('question_duration')->after('instruction_duration');

            // jika sebelumnya ada kolom duration
            $table->dropColumn('duration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subtests', function (Blueprint $table) {
            $table->integer('duration')->nullable();

            $table->dropColumn([
                'instruction_duration',
                'question_duration'
            ]);
        });
    }
};
