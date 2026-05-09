<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImpactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impacts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('produit_id')->constrained()->onDelete('cascade');

            $table->float('empreinte_carbone');

            $table->boolean('recyclable')->default(false);

            $table->string('composition');

            $table->enum('niveau_pollution', ['faible', 'moyen', 'eleve']);

            $table->integer('consommation_eau');

            $table->integer('temps_decomposition');

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
        Schema::dropIfExists('impacts');
    }
}