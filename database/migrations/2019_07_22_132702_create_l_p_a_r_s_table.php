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
            $table->float('disired_memory')->nullable();
            $table->float('disired_proc_units')->nullable();;
            $table->float('disired_v_proc')->nullable();;
            $table->float('max_memory')->nullable();;
            $table->float('max_proc_units')->nullable();;
            $table->float('max_v_adapters')->nullable();;
            $table->float('max_v_proc')->nullable();;
            $table->String('LPAR_name')->nullable();;
            $table->String('LPAR_type')->nullable();;
            $table->String('partition_name')->nullable();;
            $table->Integer('partition_Id')->nullable();;
            $table->String('proc_pool')->nullable();;
            $table->String('profil_name')->nullable();;
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
        Schema::dropIfExists('l_p_a_r_s');
    }
}
