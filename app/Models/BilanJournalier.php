<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BilanJournalier extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_depot',
        'id_type',
        'stock_initial',
        'quantite_achat',
        // ... autres colonnes
    ];

    public function depot()
    {
        return $this->belongsTo(Depot::class, 'id_depot');
    }

    public function typeEmballage()
    {
        return $this->belongsTo(TypeEmballage::class, 'id_type');
    }

    // Définissez les autres relations nécessaires
}


    