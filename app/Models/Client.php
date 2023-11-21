<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'contact',
        'adresse',
    ];
    public function Vente()
    {
        return $this->hasMany(Vente::class,"id_client");
        
    }
    protected $primaryKey = "id_client";

}
