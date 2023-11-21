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
        Schema::create('mouvements', function (Blueprint $table) {
            $table->id();
            $table->integer("id_depsource");
            $table->integer("id_depdestination");
            $table->unsignedInteger('quantite_mouvement');
            $table->timestamp('date')->default(now());
            $table->foreign("id_depsource")->references("id_stock")->on("stock_depots")->cascadeOnDelete();
            $table->foreign("id_depdestination")->references("id_stock")->on("stock_depots")->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mouvements');
    }
};
