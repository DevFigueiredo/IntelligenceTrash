<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrashTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trash', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trash_name');
            $table->string('trash_latitude');
            $table->string('trash_longitude');
            $table->string('trash_address');
            $table->integer('trash_status');
            $table->integer('trash_max_support');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');

            $table->unsignedBigInteger('id_trash_region');
            $table->foreign('id_trash_region')->references('id')->on('trash_regions');

            $table->unsignedBigInteger('id_trash_organization');
            $table->foreign('id_trash_organization')->references('id')->on('trash_organization');
            $table->boolean('status');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trash');
    }
}
