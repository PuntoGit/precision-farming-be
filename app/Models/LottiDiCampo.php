<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LottiDiCampo extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'farm_id', 'codice', 'nome', 'coltura', 'area_util_ha', 'terreno', 'particelle_catastali', 'apertura', 'chiusura', 'stagione'];

    public function coltivaziones()
    {
        return $this->hasOne(Coltivazione::class, 'lotti_id', 'id');
    }
}
