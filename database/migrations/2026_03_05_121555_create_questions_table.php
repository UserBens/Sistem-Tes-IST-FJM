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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subtest_id')
                ->constrained('subtests')
                ->cascadeOnDelete();

            $table->text('question');

            $table->enum('question_type', [
                'single_choice',
                'multiple_choice',
                'essay',
                'number_choice' // TAMBAHAN
            ]);

            $table->string('correct_answer')->nullable();

            $table->integer('weight')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
