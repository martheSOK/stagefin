<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depot extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'designation',
        
    ];

    protected $primaryKey = "id_depot";
    
    public function stocks(){
        return $this->hasMany(Stock::class,'id_depot');
        
    }

    public function personnels()
    {
        return $this->hasMany(Personnel::class,"id_depot");
        
    }
    
}
