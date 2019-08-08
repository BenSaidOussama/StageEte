<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_profiles', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('template_profiles');
    }
}
