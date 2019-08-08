<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLpars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('l_p_a_r_s', function (Blueprint $table) {
            $table->float('min_memory')->nullable();;
            $table->float('min_proc_units')->nullable();;
            
            $table->float('min_v_proc')->nullable();;
            $table->float('disired_memory')->nullable();
            $table->float('disired_proc_units')->nullable();;
            $table->float('disired_v_proc')->nullable();;
            $table->float('max_memory')->nullable();;
            $table->float('max_proc_units')->nullable();;
            $table->float('max_v_adapters')->nullable();;
            $table->float('max_v_proc')->nullable();;
            $table->String('LPAR_name')->nullable();;
            $table->String('LPAR_type')->nullable();;
            $table->String('partition_name')->nullable();;
            $table->Integer('partition_Id')->nullable();;
            $table->String('proc_pool')->nullable();;
            $table->String('profil_name')->nullable();;
            $table->boolean('shared')->default(TRUE);
            $table->Integer('Server_FK_id')->unsigned()->nullable();
            $table->foreign('Server_FK_id')->references('id')->on('servers')->onDelete('cascade');
            $table->boolean('isAuto_StartWithMangedSys')->default(TRUE);
            $table->boolean('isEnable_Connection_Monitoring')->default(FALSE);
            $table->boolean('isEnable_redundant_Error_Path_report')->default(FALSE);
            $table->boolean('isNormal_BootMode')->default(TRUE);
            $table->boolean('isSMS_BootMode')->default(FALSE);
            $table->Integer('template_FK_id')->unsigned()->nullable();
            $table->foreign('template_FK_id')->references('id')->on('template_profiles')->onDelete('cascade');
          //  $table->Integer('Server_FK_id')->unsigned()->nullable();
          //  $table->foreign('Server_FK_id')->references('id')->on('servers')->onDelete('cascade');
       
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
