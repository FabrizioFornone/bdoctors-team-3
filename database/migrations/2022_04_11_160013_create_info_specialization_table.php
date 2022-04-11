<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoSpecializationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_specialization', function (Blueprint $table) {
            $table->id();

             //column for saving foreign key info

             $table->unsignedBigInteger('info_id');
             $table->foreign('info_id')
                 ->references('id')
                 ->on('infos');
 
             //column for saving foreign key specialization
                 
             $table->unsignedBigInteger('specialization_id');
             $table->foreign('specialization_id')
                 ->references('id')
                 ->on('specializations');

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
        Schema::dropIfExists('info_specialization');
    }
}