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
        Schema::create('achats', function (Blueprint $table) {
            $table->id();
            $table->integer('id_stock');
            $table->unsignedInteger('quantite_achat');
            $table->unsignedInteger('quantite_retourne');
            $table->timestamp('date')->default(now());

            $table->foreign("id_stock")->references("id_stock")->on("stock_depots")->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achats');
    }
};
