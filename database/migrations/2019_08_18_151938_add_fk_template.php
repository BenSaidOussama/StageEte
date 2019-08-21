<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkScsi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('v__f_c_s', function (Blueprint $table) {
            //
            $table->Integer("Template_FK_id")->nullable()->unsigned();
            $table->foreign('Template_FK_id')->references('id')->on('template_profiles')->onDelete('cascade');
    
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
