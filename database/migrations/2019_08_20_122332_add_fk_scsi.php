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
        Schema::table('physical__i_o_s', function (Blueprint $table) {
            //
            $table->Integer("template_FK_id")->nullable()->unsigned();
            $table->foreign('template_FK_id')->references('id')->on('template_profiles')->onDelete('cascade');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('physical_i_o_s', function (Blueprint $table) {
            //
        });
    }
}
