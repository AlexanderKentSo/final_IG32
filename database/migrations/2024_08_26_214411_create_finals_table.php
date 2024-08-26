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
        Schema::create('finals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id');
            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('strategy_id');
            $table->foreign('strategy_id')
                ->references('id')
                ->on('strategies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->double('hpp');
            $table->double('laba_kotor');
            $table->double('laba_bersih');
            $table->double('target_cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finals');
    }
};
