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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_competition')->nullable();
            $table->string('short_name')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->integer('current_matchday')->nullable();
            $table->string('winner')->nullable();
            $table->timestamps();
        });
        Schema::table('football_matches', function (Blueprint $table) {
             //B1 : Create column FK
             $table->unsignedBigInteger('competition_id');
             //B2 : Create FK reference product_category (id)
             $table->foreign('competition_id')->references('id')->on('competitions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competition');
    }
};
