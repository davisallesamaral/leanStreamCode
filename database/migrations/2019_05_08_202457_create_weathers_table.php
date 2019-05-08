<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('weathers', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('dt', 50)->nullable(); 
            $table->string('temp', 50)->nullable(); 
            $table->string('temp_min', 50)->nullable(); 
            $table->string('pressure', 50)->nullable();
            $table->string('sea_level', 50)->nullable(); 
            $table->string('grnd_level', 50)->nullable(); 
            $table->string('humidity', 50)->nullable();
            $table->string('temp_kf', 50)->nullable();

            $table->string('main', 50)->nullable(); 
            $table->string('description', 50)->nullable();
            $table->string('icon', 50)->nullable();

            $table->string('all', 50)->nullable();

            $table->string('speed', 50)->nullable();
            $table->string('deg', 50)->nullable();

            $table->string('pod', 50)->nullable();

            $table->string('aldt_txtl', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weathers');
    }
}
