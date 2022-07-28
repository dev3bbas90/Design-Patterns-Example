<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seat_id');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('booking_id');
            $table->string('code');
            $table->text('token')->nullable();
            $table->float('price');
            $table->foreign('seat_id')->on('seats')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('event_id')->on('events')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('booking_id')->on('bookings')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('booking_details');
    }
}
