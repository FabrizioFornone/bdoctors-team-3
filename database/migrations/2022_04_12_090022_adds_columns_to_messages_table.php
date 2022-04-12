<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddsColumnsToMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            
            $table->foreignId('user_id')->after('id')->constrained();
            $table->string('name')->after('user_id');
            $table->string('email')->after('name');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            
            $table->dropForeign('messages_user_id_foreign');
            $table->dropColumn('user_id');
            $table->dropColumn('name');
            $table->dropColumn('email');

        });
    }
}
