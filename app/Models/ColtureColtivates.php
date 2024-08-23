<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColtureColtivates extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'farm_id', 'colore', 'prodotto_coltivato', 'udm', 'specie', 'descrizione', 'note', 'portinnesto', 'consumo_animale'];
}
