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
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->string('area_name')->nullable();
            $table->bigInteger('seat_number')->nullable();
            $table->string('status',255)->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('match_id');
            $table->foreign('match_id')->references('id')->on('football_matches');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
