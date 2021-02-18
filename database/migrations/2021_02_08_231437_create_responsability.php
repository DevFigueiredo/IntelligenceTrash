<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsability extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsability', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_team');
            $table->foreign('id_team')->references('id')->on('trash_team_users');
            $table->unsignedBigInteger('id_trash');
            $table->foreign('id_trash')->references('id')->on('trash');
            $table->unsignedBigInteger('id_region');
            $table->foreign('id_region')->references('id')->on('trash_regions');            
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
        Schema::dropIfExists('responsability');
    }
}
