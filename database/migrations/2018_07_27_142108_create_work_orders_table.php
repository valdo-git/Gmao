<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero');
            $table->string('description')->nullable();
            $table->date('date_creation')->nullable();
            $table->integer('dossier_id')->nullable();
            //   $table->integer('dossier_id')->unsigned()->index()->nullable();
            //   $table->foreign('dossier_id')->references('id')->on('dossiers');
            $table->string('statut');
           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordres');
    }
}
