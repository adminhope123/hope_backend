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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('userName')->nullable();
            $table->string('role')->nullable();
            $table->string('email')->nullable();
            $table->string('mobileNumber')->nullable();
            $table->string('address')->nullable();
            $table->string('salary')->nullable();
            $table->string('password')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->nullable();
            $table->string('mobileNumber')->nullable();
            $table->string('role')->nullable();
            $table->string('password')->nullable();
            $table->string('address')->nullable();
            $table->string('salary')->nullable();


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
        Schema::dropIfExists('employees');
    }
};
