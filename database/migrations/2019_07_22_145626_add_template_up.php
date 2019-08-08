<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTemplateUp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('template_profiles', function (Blueprint $table) {
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
