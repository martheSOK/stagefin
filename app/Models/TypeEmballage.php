<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeEmballage extends Model
{
    use HasFactory;
    protected $fillable = [

        'libelle',
    
        
    ];
    protected $primaryKey = "id_type";

    public function stocks()
    {
        return $this->hasMany(Stock::class,"id_type");
        
    }

    public function consignation_fourni()
    {
        return $this->hasMany(ConsignationFournisseur::class,"id_type");
        
    }

 


}
