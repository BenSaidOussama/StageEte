<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFKClientToTemplate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('l_p_a_r_s', function (Blueprint $table) {
            $table->Integer('template_FK_id')->unsigned()->nullable();
            $table->foreign('template_FK_id')->references('id')->on('template_profiles');
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
