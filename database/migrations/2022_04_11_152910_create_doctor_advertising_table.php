<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorAdvertisingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_advertising', function (Blueprint $table) {
            $table->id();

            //column for saving foreign key doctors

            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')
                ->references('id')
                ->on('doctors');

            //column for saving foreign key advertising
                
            $table->unsignedBigInteger('advertising_id');
            $table->foreign('advertising_id')
                ->references('id')
                ->on('advertisings');

            $table->dateTime('start advertising');
            $table->dateTime('end advertising');
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
        Schema::dropIfExists('doctor_advertising');
    }
}
