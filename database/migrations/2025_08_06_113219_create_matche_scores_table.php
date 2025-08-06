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
    Schema::create('matche_scores', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('matche_id');
    $table->integer('team_a_score');
    $table->integer('team_b_score');
    $table->unsignedInteger('created_by');
    $table->timestamps();

    $table->foreign('matche_id')->references('id')->on('matches')->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matche_scores');
    }
};
