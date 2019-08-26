<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdAdapterEthe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('v__s_c_s_i_s', function (Blueprint $table) {
            //
            $table->Integer('Adpater_id');

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
