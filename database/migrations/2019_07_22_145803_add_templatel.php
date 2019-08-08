<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTemplatel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('template_profiles', function (Blueprint $table) {
            //
           
            $table->float('disired_memory');
            $table->float('disired_proc_units');
            $table->float('disired_v_proc');
            $table->float('max_memory');
            $table->float('max_proc_units');
            $table->float('max_v_adapters');
            $table->float('max_v_proc');
            $table->String('partition_name');
            $table->Integer('partition_Id');
            $table->String('proc_pool');
            $table->String('profil_name');
            $table->boolean('shared')->default(TRUE);
            $table->float('min_memory');
            $table->float('min_proc_units');
            
            $table->float('min_v_proc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('template_profiles', function (Blueprint $table) {
            //
        });
    }
}
