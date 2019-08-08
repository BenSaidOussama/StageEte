<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVFCSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('v__f_c_s', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps(); 
            $table->boolean('isrequired');
            $table->Integer('server_adapter_id');
            $table->String('server_partition');
            $table->String('wwpn');
            $table->String('wwpn_lpm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v__f_c_s');
    }
}
