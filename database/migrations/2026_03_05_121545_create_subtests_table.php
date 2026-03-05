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
        Schema::create('subtests', function (Blueprint $table) {
            $table->id();
            $table->string('subtest_name');
            $table->integer('duration'); // minutes
            $table->text('instruction');
            $table->string('instruction_image')->nullable(); // gambar instruksi
            $table->integer('order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subtests');
    }
};
