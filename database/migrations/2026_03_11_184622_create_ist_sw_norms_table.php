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
        Schema::create('ist_sw_norms', function (Blueprint $table) {
            $table->id();
            // Kelompok umur: 'lte24', 'lte28', 'lte33', 'lte39', 'lte45', 'lte60'
            $table->string('age_group');

            // Nama subtest: SE, WA, AN, GE, RA, ZR, FA, WU, ME
            $table->string('subtest_name');

            // Raw Score (RW)
            $table->integer('rw');

            // Standard Score (SW)
            $table->integer('sw');

            $table->timestamps();

            $table->index(['age_group', 'subtest_name', 'rw']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ist_sw_norms');
    }
};
