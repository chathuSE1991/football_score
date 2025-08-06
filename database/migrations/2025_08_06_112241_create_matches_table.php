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
        Schema::create('matches', function (Blueprint $table) {
            $table->id(); // shorthand for: bigIncrements('id')
            $table->string('name', 100);
            $table->string('team_a', 50);
            $table->string('team_b', 50);
            $table->date('match_date');
            $table->tinyInteger('status')->default(0)->comment('0-inactive,1-active');
            $table->tinyInteger('is_live')->default(0)->comment('0-not start,1-live,2-end');
            $table->unsignedInteger('created_by'); // regular int, no auto_increment
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
