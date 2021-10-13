<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::dropIfExists('cars');
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');;;;
            $table->string('body');;;;
            $table->integer('price');;;;
            $table->integer('old_price')->nullable();;;;
            $table->string('salon')->nullable();;;;
            $table->unsignedInteger('car_class_id')->nullable();;;;
            $table->string('kpp')->nullable();;;;
            $table->integer('year')->nullable();;;;
            $table->string('color')->nullable();;;;
            $table->unsignedInteger('car_body_id')->nullable();;;;
            $table->unsignedInteger('car_engine_id')->nullable();;;;
            $table->boolean('is_new')->default(false);;;;
            $table->timestamps();;;;
        });

        Schema::table('cars', function (Blueprint $table) {
           $table->string('category_slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
