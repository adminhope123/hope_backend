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
        Schema::create('uattendences', function (Blueprint $table) {
            $table->id();
            $table->string('employeeId')->nullable();
            $table->string('absent')->nullable();
            $table->string('date')->nullable();
            $table->string('day')->nullable();
            $table->string('present')->nullable();
            $table->string('totalwork')->nullable();
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
        Schema::dropIfExists('uattendences');
    }
};
