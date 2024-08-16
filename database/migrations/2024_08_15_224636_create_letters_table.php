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
        Schema::create('letters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('board_id');
            $table->foreign('board_id')
                ->references('id')
                ->on('boards')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('row');
            $table->integer('col');
            $table->tinyInteger('show');
            $table->string('letter', 10);
            $table->integer('head_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letters');
    }
};
