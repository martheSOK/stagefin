<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_stock',
        'quantite_achat',
        'quantite_retourne',
        'date',
    ];


    protected $dates = ['date'];
    public $timestamps = false;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function stocks():BelongsTo
    {
        return $this->belongsTo(Stock::class,"id_stock");
    }
    
}
