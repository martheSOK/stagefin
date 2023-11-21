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
        Schema::create('personnels', function (Blueprint $table) {
            $table->id('id_personnel');
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->string('contact');
            $table->string('adresse');
            $table->integer('id_depot');
            $table->timestamps();

            $table->foreign("id_depot")->references("id_depot")->on("depots")->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnels');
    }
};
