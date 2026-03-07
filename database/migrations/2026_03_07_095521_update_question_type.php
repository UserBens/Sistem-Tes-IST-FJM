<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            ALTER TABLE questions 
            MODIFY question_type 
            ENUM('single_choice','multiple_choice','essay','number_choice')
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("
            ALTER TABLE questions 
            MODIFY question_type 
            ENUM('single_choice','multiple_choice','essay')
        ");
    }
};
