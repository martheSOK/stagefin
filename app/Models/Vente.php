<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;
    protected $fillable = [
        'etat',
        'quantite_consigne',
        'quantite_retitue',
        
    ];
    public function personnels():BelongsTo
    {
        return $this->belongsTo(Personnel::class,"id_personnel");
    }

    public function Stock():BelongsTo
    {
        return $this->belongsTo(Vente::class,"id_stock");
    }

    public function client():BelongsTo
    {
        return $this->belongsTo(Client::class,"id_client");
    }

    public function fournisseur():BelongsTo
    {
        return $this->belongsTo(Fournisseur::class,"id_fournisseur");
    }



}
