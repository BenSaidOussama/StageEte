<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFKServerLPARs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('l_p_a_r_s', function (Blueprint $table) {
            $table->Integer('Server_FK_id')->unsigned()->nullable();
            $table->foreign('Server_FK_id')->references('id')->on('servers')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('l_p_a_r_s', function (Blueprint $table) {
            //
        });
    }
}
