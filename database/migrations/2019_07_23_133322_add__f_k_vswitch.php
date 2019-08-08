<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFKVswitch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('v_switches', function (Blueprint $table) {
            $table->Integer('Server_FK_id')->unsigned()->nullable();
            $table->foreign('Server_FK_id')->references('id')->on('servers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('v_switches', function (Blueprint $table) {
            //
        });
    }
}
