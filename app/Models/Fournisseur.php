<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_fournisseur',
        'contact',
        'adresse',
        
    ];

    protected $primaryKey = "id_fournisseur";

    public function stock()
    {
        return $this->belongsToMany(Stock::class,"stock_fournisseurs", "id_stock", "id_fournisseur");
        
    }

    public function consignation_client()
    {
        return $this->hasMany(Type::class,"id_fournisseur");
        
    }

    public function consignation_fourni()
    {
        return $this->hasMany(Type::class,"id_fournisseur");
        
    }
}
