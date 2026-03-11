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
        Schema::create('ist_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('participant_id')
                ->constrained('participants')
                ->cascadeOnDelete();

            // Skor RW tiap subtest
            $table->integer('rw_se')->default(0);
            $table->integer('rw_wa')->default(0);
            $table->integer('rw_an')->default(0);
            $table->integer('rw_ge')->default(0);
            $table->integer('rw_me')->default(0);
            $table->integer('rw_ra')->default(0);
            $table->integer('rw_zr')->default(0);
            $table->integer('rw_fa')->default(0);
            $table->integer('rw_wu')->default(0);

            // Skor SW tiap subtest
            $table->integer('sw_se')->nullable();
            $table->integer('sw_wa')->nullable();
            $table->integer('sw_an')->nullable();
            $table->integer('sw_ge')->nullable();
            $table->integer('sw_me')->nullable();
            $table->integer('sw_ra')->nullable();
            $table->integer('sw_zr')->nullable();
            $table->integer('sw_fa')->nullable();
            $table->integer('sw_wu')->nullable();

            // Kategori tiap subtest
            $table->string('cat_se')->nullable();
            $table->string('cat_wa')->nullable();
            $table->string('cat_an')->nullable();
            $table->string('cat_ge')->nullable();
            $table->string('cat_me')->nullable();
            $table->string('cat_ra')->nullable();
            $table->string('cat_zr')->nullable();
            $table->string('cat_fa')->nullable();
            $table->string('cat_wu')->nullable();

            // Total
            $table->integer('total_rw')->default(0);
            $table->integer('total_sw')->nullable(); // SW JML (dihitung via norma)

            // IQ & Klasifikasi
            $table->integer('iq')->nullable();
            $table->string('iq_category')->nullable(); // Very Superior, Superior, dst.

            // Dominasi: Verbal / Eksak / Non Eksak
            $table->string('dominasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ist_results');
    }
};
