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
        Schema::create('ist_norms', function (Blueprint $table) {
            $table->id();
            $table->string('age_group');
            $table->integer('rw');
            $table->integer('se');
            $table->integer('wa');
            $table->integer('an');
            $table->integer('ge');
            $table->integer('ra');
            $table->integer('zr');
            $table->integer('fa');
            $table->integer('wu');
            $table->integer('me');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ist_norms');
    }
};
