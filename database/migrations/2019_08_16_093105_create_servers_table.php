<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
            $table->String("LPAR_prefix");
            $table->String("Server_description");
            $table->String("Server_name");
            $table->String("Server_type");
            $table->Integer("Client_FK_id")->nullable()->unsigned();
            $table->foreign('Client_FK_id')->references('id')->on('clients')->onDelete('cascade');
            $table->Integer("Server_LPARs_nbr");


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servers');
    }
}
