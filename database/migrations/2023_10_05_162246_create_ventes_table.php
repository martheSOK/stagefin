<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->integer('id_personnel');
            $table->integer('id_client');
            $table->string('etat');
            $table->unsignedInteger('quantite_Consigne');
            $table->integer('quantite_restitue');
            $table->timestamps();

            $table->foreign("id_personnel")->references("id_personnel")->on("personnels")->cascadeOnDelete();
            $table->foreign("id_client")->references("id_client")->on("clients")->cascadeOnDelete();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventes');
    }
};
