<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFKLpar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('v__f_c_s', function (Blueprint $table) {
            $table->Integer('LPAR_FK_id')->unsigned()->nullable();
            $table->foreign('LPAR_FK_id')->references('id')->on('l_p_a_r_s');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('v__f_c_s', function (Blueprint $table) {
            //
        });
    }
}
