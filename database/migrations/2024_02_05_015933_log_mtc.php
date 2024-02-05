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
        Schema::create('log_mtc', function (Blueprint $table) {
            $table->id();
            $table->string('kd_it', 10);
            $table->date('tgl');
            $table->string('pic', 10);
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
        Schema::dropIfExists('log_mtc');
    }
};
