<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('festivals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date');
            $table->string('location');
            $table->integer('available_tickets')->default(0);  // Aantal beschikbare tickets
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('festivals');
    }
};
