<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHallAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hall_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hall_id');
            $table->enum('type',['blank','category']);
            $table->integer('category_id')->nullable();
            $table->string('selection_type')->nullable();
            $table->string('selection_value')->nullable();
            $table->string('selection_attribute')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('single')->nullable();
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
        Schema::dropIfExists('hall_attributes');
    }
}
