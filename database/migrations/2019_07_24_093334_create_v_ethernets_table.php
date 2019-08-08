<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVEthernetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('v_ethernets', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
            $table->boolean('isrequired')->default(TRUE);
            $table->Integer('PV_id');
            $table->String('type_v_adapter');
            $table->String('VLANs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v_ethernets');
    }
}
