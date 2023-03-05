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
        Schema::create('user_weather', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('weather_main');
            $table->string('weather_description');
            $table->float('temp');
            $table->float('feel_temp');
            $table->float('min_temp');
            $table->float('max_temp');
            $table->float('pressure');
            $table->float('humidity');
            $table->float('visibility');
            $table->float('speed_wind');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_weather');
    }
};
