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
        Schema::create('log_pemakais', function (Blueprint $table) {
            $table->id();
            $table->string('kd_it', 10);
            $table->string('dept', 20);
            $table->string('pic', 30);
            $table->text('location');
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->text('kondisi');
            $table->timestamps();
            $table->foreign('kd_it')->references('kd_it')->on('assetit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_pemakais');
    }
};
