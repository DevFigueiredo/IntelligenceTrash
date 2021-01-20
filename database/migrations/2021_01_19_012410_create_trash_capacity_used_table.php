<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrashCapacityUsedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trash_capacity_used', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trash_capacity_used');
            $table->unsignedBigInteger('id_trash');
            $table->foreign('id_trash')->references('id')->on('trash');
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
        Schema::dropIfExists('trash_capacity_used');
    }
}
