<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkIo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('physical__i_o_s', function (Blueprint $table) {
            $table->Integer('Template_FK_id')->unsigned()->nullable();
            $table->foreign('Template_FK_id')->references('id')->on('template_profiles');
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
        Schema::table('physical__i_o_s', function (Blueprint $table) {
            //
        });
    }
}
