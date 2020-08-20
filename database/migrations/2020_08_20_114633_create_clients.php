<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string("nom",255)->nullable();
            $table->string("num_permis")->unique();
            $table->string("cin",8)->unique();
            $table->string("email",255)->unique();
            $table->string("phone_nb",8)->nullable();
            $table->text("adresse")->nullable();
            $table->string("date_nais",255)->nullable();
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
        Schema::dropIfExists('clients');
    }
}
