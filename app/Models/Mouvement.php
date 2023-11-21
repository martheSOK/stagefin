<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Mouvement extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_depsource',
        'id_depdestination',
        'quantite_mouvement',
        'date',
        
    ];
    protected $dates = ['date'];
    public $timestamps = false;

    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function depot_source():BelongsTo
    {
        return $this->belongsTo(Stock::class,"id_depsource");
    }

    public function depot_destination():BelongsTo
    {
        return $this->belongsTo(Stock::class,"id_depdestination");
    }
}
