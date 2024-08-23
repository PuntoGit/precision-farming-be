<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terreni extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'farm_id', 'nome_terreno', 'codice', 'comune_di_appartenenza', 'costo_per_anno', 'ricavo_per_anno', 'tipo_di_gestione', 'nome_del_proprietario', 'latitude', 'longitude', 'stato', 'area_graf_ha', 'suolo_vivo'];

    public function subTerreni()
    {
        return $this->hasMany(SubTerreni::class, 'terrenis_id', 'id');
    }
}
