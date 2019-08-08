<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsLpar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('l_p_a_r_s', function (Blueprint $table) {
            $table->boolean('isAuto_StartWithMangedSys')->default(TRUE);
            $table->boolean('isEnable_Connection_Monitoring')->default(FALSE);
            $table->boolean('isEnable_redundant_Error_Path_report')->default(FALSE);
            $table->boolean('isNormal_BootMode')->default(TRUE);
            $table->boolean('isSMS_BootMode')->default(FALSE);
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
