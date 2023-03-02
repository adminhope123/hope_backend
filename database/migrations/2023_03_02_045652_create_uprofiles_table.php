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
        Schema::create('uprofiles', function (Blueprint $table) {
            $table->id();
            $table->string('E_Id')->nullable();
            $table->string('fullname')->nullable();
            $table->string('post')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('birthDate')->nullable();
            $table->string('gender')->nullable();
            $table->string('countries')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
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
        Schema::dropIfExists('uprofiles');
    }
};
