<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hall_time_frame_id');
            $table->unsignedBigInteger('theater_id');
            $table->unsignedBigInteger('hall_id');
            $table->unsignedBigInteger('program_id');
            $table->date('date');
            $table->float('weekday_price')->default(0);
            $table->float('weekend_price')->default(0);
            $table->foreign('hall_id')->on('halls')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('theater_id')->on('halls')->references('theater_id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('program_id')->on('programs')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('hall_time_frame_id')->on('hall_time_frames')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
