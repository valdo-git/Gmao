<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterielsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idgrpe');

            //caracteristiques generales
            $table->string('designation');
            $table->date('dateAcquisitionMat');
            $table->boolean('disponibilite');

            $table->string('typeMat')->nullable();
            $table->string('numImmat')->nullable();
            $table->string('numChassis')->nullable();

            // engins roulants
            $table->integer('kilometrageInit')->nullable();
            $table->integer('kilometrage')->nullable();
            $table->date('dateMiseEnCirc')->nullable();

            // engins spéciaux
            $table->string('horometre')->nullable();
            $table->string('horometreInit')->nullable();

            //equipements d'entretien
            $table->string('codeProduit')->nullable();
            $table->date('dateInstallation')->nullable();

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
        Schema::dropIfExists('materiels');
    }
}
