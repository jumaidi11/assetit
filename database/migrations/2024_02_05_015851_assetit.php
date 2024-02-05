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
        Schema::create('assetit', function (Blueprint $table) {
            $table->string('kd_it', 10)->primary();
            $table->string('kd_asset', 10)->nullable();
            $table->string('dept', 20);
            $table->string('jenis', 20);
            $table->string('pic', 30)->nullable();
            $table->text('merek',)->nullable();
            $table->text('model',)->nullable();
            $table->year('tahun_beli')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assetit');
    }
};
