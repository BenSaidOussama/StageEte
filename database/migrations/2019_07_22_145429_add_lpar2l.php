<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLpar2l extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('l_p_a_r_s', function (Blueprint $table) {
            //
            $table->float('min_memory')->nullable();;
            $table->float('min_proc_units')->nullable();;
            
            $table->float('min_v_proc')->nullable();;
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
