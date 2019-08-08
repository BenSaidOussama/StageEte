<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLPARSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('l_p_a_r_s', function (Blueprint $table) {
            
            $table->Increments('id');
            $table->timestamps();
            $table->float('disired_memory');
            $table->float('disired_proc_units');
            $table->float('disired_v_proc');
            $table->float('max_memory');
            $table->float('max_proc_units');
            $table->float('max_v_adapters');
            $table->float('max_v_proc');
            $table->String('LPAR_name');
            $table->String('LPAR_type');
            $table->String('partition_name');
            $table->Integer('partition_Id');
            $table->String('proc_pool');
            $table->String('profil_name');
            $table->boolean('shared')->default(TRUE);
            $table->float('min_memory');
            $table->float('min_proc_units');
            $table->float('min_v_proc');
            $table->Integer('template_FK_id')->unsigned()->nullable();
            $table->foreign('template_FK_id')->references('id')->on('template_profiles')->onDelete('cascade');
            $table->boolean('isAuto_StartWithMangedSys')->default(TRUE);
            $table->boolean('isEnable_Connection_Monitoring')->default(FALSE);
            $table->boolean('isEnable_redundant_Error_Path_report')->default(FALSE);
            $table->boolean('isNormal_BootMode')->default(TRUE);
            $table->boolean('isSMS_BootMode')->default(FALSE);
            $table->Integer('Server_FK_id')->unsigned()->nullable();
            $table->foreign('Server_FK_id')->references('id')->on('servers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('l_p_a_r_s');
    }
}
