<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TeamPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_permissions', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('id_team');
            $table->foreign('id_team')->references('id')->on('trash_team_users');

            $table->unsignedBigInteger('id_permission');
            $table->foreign('id_permission')->references('id')->on('team_view_permissions');
           
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
        Schema::dropIfExists('team_permissions');
    }
}
