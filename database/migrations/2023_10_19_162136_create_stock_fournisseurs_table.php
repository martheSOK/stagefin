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
        Schema::create('stock_fournisseurs', function (Blueprint $table) {
            $table->integer('id_stock');
            $table->integer('id_fournisseur');
            $table->timestamps();


            $table-> foreign('id_stock')->references('id_stock')->on("stock_depots")->cascadeOnDelete();
            $table-> foreign('id_fournisseur')->references('id_fournisseur')->on("fournisseurs")->cascadeOnDelete();
            $table->primary(['id_stock','id_fournisseur']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_fournisseurs');
    }
};
