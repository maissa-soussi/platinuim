<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->integer("categorie_id")->nullable();
            $table->string("matricule",255)->unique();
            $table->string("vehicule",255)->nullable();
            $table->string("carburant",255)->nullable();
            $table->integer("nb_cyl")->nullable();
            $table->integer("puissance_fiscale")->nullable();
            $table->integer("nb_vit")->nullable();
            $table->string("couleur",255)->nullable();
            $table->string("options")->nullable();
            $table->string("alertes")->nullable();
            $table->string("reparations")->nullable();
            $table->string("visites_tech")->nullable();
            $table->string("vidanges")->nullable();
            $table->string("vignettes")->nullable();
            $table->string("assurences")->nullable();
            $table->string("photo")->nullable();
            $table->integer("status")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicules');
    }
}
