<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVswitchEthernet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('v__s_c_s_i_s', function (Blueprint $table) {
            $table->Integer("LPAR_FK_id")->nullable()->unsigned();
            $table->foreign('LPAR_FK_id')->references('id')->on('l_p_a_r_s')->onDelete('cascade');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('v__s_c_s_i_s', function (Blueprint $table) {
            //
        });
    }
}
