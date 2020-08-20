<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicules extends Migration
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
            $table->integer("vehicule_categorie_id")->nullable();
            $table->string("matricule",255)->unique();
            $table->string("vehicule",255)->nullable();
            $table->string("carburant",255)->nullable();
            $table->integer("nb_cyl")->nullable();
            $table->string("puissance_fiscale",255)->nullable();
            $table->integer("nb_vit")->nullable();
            $table->string("couleur",255)->nullable();
            $table->text("options")->nullable();
            $table->text("alertes")->nullable();
            $table->text("reparations")->nullable();
            $table->text("visites_tech")->nullable();
            $table->text("vidanges")->nullable();
            $table->text("vignettes")->nullable();
            $table->text("assurences")->nullable();
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
