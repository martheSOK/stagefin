<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_depot',
        'id_type',
        
       // 'id_fournisseur',
        'quantite_stock',
        
    ];
    protected $table="stock_depots";

    protected $primaryKey = "id_stock";

    
    public function achats()
    {
        return $this->hasMany(Stock::class,"id_stock");
        
    }


    public function consignation()
    {
        return $this->hasMany(Consignation::class,"id_stock");
        
    }

    public function mouvements_source()
    {
        return $this->hasMany(Mouvement::class,"id_depsource");
        
    }

    public function mouvements_destination()
    {
        return $this->hasMany(Mouvement::class,"id_depdestination");
        
    }

    public function type_emballages()
    {
        return $this->belongsTo(TypeEmballage::class,"id_type");
    }

    public function fournisseurs()
    {
        return $this->belongsToMany(Fournisseur::class,"stock_fournisseurs", "id_stock", "id_fournisseur");
    }

    public function depots():BelongsTo
    {
        return $this->belongsTo(Depot::class,"id_depot");
    }


}
