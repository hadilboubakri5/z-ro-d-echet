<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('alternatives');
        Schema::dropIfExists('impacts');
        Schema::dropIfExists('produits');

        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('code_barre')->unique();
            $table->string('nom');
            $table->string('marque')->nullable();
            $table->string('categorie')->nullable();
            $table->text('description')->nullable();
            $table->unsignedTinyInteger('impact_score')->nullable();
            $table->string('emballage')->nullable();
            $table->boolean('recyclable')->default(false);
            $table->string('score_zero_dechet')->nullable();
            $table->timestamps();
        });

        Schema::create('impacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produit_id')->constrained('produits')->cascadeOnDelete();
            $table->string('empreinte_carbone')->nullable();
            $table->boolean('recyclable')->default(false);
            $table->string('composition')->nullable();
            $table->string('niveau_pollution')->nullable();
            $table->string('consommation_eau')->nullable();
            $table->unsignedInteger('temps_decomposition')->nullable();
            $table->timestamps();
        });

        Schema::create('alternatives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produit_id')->constrained('produits')->cascadeOnDelete();
            $table->string('nom');
            $table->text('description')->nullable();
            $table->string('impact_reduit')->nullable();
            $table->decimal('prix', 10, 2)->nullable();
            $table->string('marque')->nullable();
            $table->boolean('disponible')->default(true);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alternatives');
        Schema::dropIfExists('impacts');
        Schema::dropIfExists('produits');
    }
};
