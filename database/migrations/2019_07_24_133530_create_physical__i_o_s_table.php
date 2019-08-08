<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhysicalIOSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical__i_o_s', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
            $table->String('index_slot');
            $table->boolean('isdesired');
            $table->boolean('isrequired');
            $table->String('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('physical__i_o_s');
    }
}
