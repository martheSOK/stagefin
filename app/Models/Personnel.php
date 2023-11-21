<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Personnel extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'sexe',
        'contact',
        'adresse',
        'id_depot',
    ];

    protected $primaryKey = "id_personnel";


    public function depot():BelongsTo
    {
        return $this->belongsTo(Depot::class,"id_depot");
    }
    

    public function vente()
    {
        return $this->hasMany(Vente::class,"id_personnel");
        
    }
}

