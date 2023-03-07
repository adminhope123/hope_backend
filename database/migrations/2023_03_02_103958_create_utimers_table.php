<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utimers', function (Blueprint $table) {
            $table->id();
            $table->string('employeeId')->nullable();
            $table->string('timerid')->nullable();
            $table->string('state')->nullable();
            $table->string('parent')->nullable();
            $table->string('date')->nullable();
            $table->string('start')->nullable();
            $table->string('stop')->nullable();
            $table->string('color')->nullable();
            $table->string('hours')->nullable();
            $table->string('day')->nullable();
            $table->string('mins')->nullable();
            $table->string('secs')->nullable();
            $table->string('present')->nullable();
            $table->string('absent')->nullable();
            $table->string('totalSeconds')->nullable();
            $table->string('month')->nullable();
            $table->string('totalTimeWork')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utimers');
    }
};
