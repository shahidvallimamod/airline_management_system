<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('airline_id')->constrained();
            $table->foreignId('from_airport')->constrained('airports','id');
            $table->foreignId('to_airport')->constrained('airports','id');
            $table->string('airplane_model');
            $table->string('flight_number');
            $table->unsignedMediumInteger('available_seat');
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
        Schema::dropIfExists('tickets');
    }
}
