<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAttributsLpars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('l_p_a_r_s', function (Blueprint $table) {
            $table->Integer('max_proc');
            $table->Integer('min_proc');
            $table->Integer('desired_proc');
            $table->Boolean('sync_conf');
            $table->Integer("Template_FK_id")->nullable()->unsigned();
            $table->foreign('Template_FK_id')->references('id')->on('template_profiles')->onDelete('cascade');
            $table->Integer("Server_FK_id")->nullable()->unsigned();
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
        Schema::table('l_p_a_r_s', function (Blueprint $table) {
            //
        });
    }
}
