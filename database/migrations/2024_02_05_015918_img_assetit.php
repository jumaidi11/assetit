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
        Schema::create('img_assetit', function (Blueprint $table) {
            $table->id();
            $table->string('assetit.kd_it', 10);
            $table->string('url', 255);
            $table->timestamps();

            $table->foreign('assetit.kd_it')->references('kd_it')->on('assetit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('img_assetit');
    }
};
