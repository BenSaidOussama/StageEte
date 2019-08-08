<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFKTemplateFc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('v__f_c_s', function (Blueprint $table) {
            $table->Integer('Template_FK_id')->unsigned()->nullable();
            $table->foreign('Template_FK_id')->references('id')->on('template_profiles');
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
