<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternatives', function (Blueprint $table) {
            $table->id();

            $table->foreignId('produit_id')->constrained()->onDelete('cascade');

            $table->string('nom');

            $table->text('description');

            $table->integer('impact_reduit');

            $table->decimal('prix', 8, 2);

            $table->string('marque');

            $table->boolean('disponible')->default(true);

            $table->string('image')->nullable();

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
        Schema::dropIfExists('alternatives');
    }
}