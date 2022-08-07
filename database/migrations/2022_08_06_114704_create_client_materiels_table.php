<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientMaterielsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_materiel', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('materiel_id');
            $table->foreign('client_id')->references('id')->on('clients')->constrainted()->onDelete('cascade');
            $table->foreign('materiel_id')->references('id')->on('materiels')->constrainted()->onDelete('cascade');
            $table->primary(['client_id', 'materiel_id']);
            
            Schema::enableForeignKeyConstraints();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_materiels');
    }
}
