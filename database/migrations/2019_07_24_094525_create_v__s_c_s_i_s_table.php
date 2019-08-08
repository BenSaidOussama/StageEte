<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVSCSISTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('v__s_c_s_i_s', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
            $table->boolean('isClientAdapter');
            $table->boolean('isServerAdapter');
            $table->boolean('isClientPartition');
            $table->boolean('isServerPartition');
            $table->boolean('isrequired');
            $table->String('type_SCSI');
  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v__s_c_s_i_s');
    }
}
