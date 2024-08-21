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
        Schema::create('mc_submissions', function (Blueprint $table) {
//            $table->id();
            $table->foreignId('mc_question_id');
            $table->foreign('mc_question_id')
                ->references('id')
                ->on('mc_questions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('team_id');
            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('answer', 5);
            $table->double('score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mc_submissions');
    }
};
