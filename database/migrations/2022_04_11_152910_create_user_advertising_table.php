<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAdvertisingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_advertising', function (Blueprint $table) {
            $table->id();

            //column for saving foreign key doctors

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

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
        Schema::dropIfExists('user_advertising');
    }
}
