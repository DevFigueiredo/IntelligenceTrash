<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrashHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trash_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trash_history_description');
            $table->integer('trash_supported');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');


            $table->unsignedBigInteger('id_trash');
            $table->foreign('id_trash')->references('id')->on('trash');
         
            $table->unsignedBigInteger('id_history_status');
            $table->foreign('id_history_status')->references('id')->on('trash_history_status');
         
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
         
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trash_history');
    }
}
