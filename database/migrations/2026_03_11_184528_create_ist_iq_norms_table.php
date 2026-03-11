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
        Schema::create('ist_iq_norms', function (Blueprint $table) {
            $table->id();
            // Total RW (jumlah semua subtest)
            $table->integer('total_rw');

            // IQ berdasarkan kelompok umur
            $table->integer('iq_age_13')->nullable();
            $table->integer('iq_age_14')->nullable();
            $table->integer('iq_age_15')->nullable();
            $table->integer('iq_age_16')->nullable();
            $table->integer('iq_age_17')->nullable();
            $table->integer('iq_age_18')->nullable();
            $table->integer('iq_lte20')->nullable();  // < 20 tahun (dewasa)
            $table->integer('iq_lte24')->nullable();  // < 24 tahun
            $table->integer('iq_lte28')->nullable();  // < 28 tahun
            $table->integer('iq_lte33')->nullable();  // < 33 tahun
            $table->integer('iq_lte39')->nullable();  // < 39 tahun
            $table->integer('iq_lte45')->nullable();  // < 45 tahun
            $table->integer('iq_lte60')->nullable();  // < 60 tahun
            $table->integer('iq_value')->nullable();

            $table->timestamps();

            $table->index('total_rw');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ist_iq_norms');
    }
};
