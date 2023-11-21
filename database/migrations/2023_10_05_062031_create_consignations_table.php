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
        Schema::create('consignations', function (Blueprint $table) {
            $table->id();
            $table->integer('id_fournisseur');
            $table->integer('id_type');
            $table->integer('quantite_consigne');
            $table->timestamps();

            $table->foreign("id_type")->references("id_type")->on("type_emballages")->cascadeOnDelete();
            $table->foreign("id_fournisseur")->references("id_fournisseur")->on("fournisseurs")->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consignations');
    }
};
