<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Consignation extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_fournisseur',
        'id_type',
        'quantite_Consigne',
        
    ];


    /*public function vente()
    {
        return $this->hasMany(Vente::class,"id_client");
        
    }*/

    public function fournisseurs():BelongsTo
    {
        return $this->belongsTo(Fournisseur::class,"id_fournisseur");
    }

    public function typemballages():BelongsTo
    {
        return $this->belongsTo(TypeEmballage::class,"id_type");
    }

}
