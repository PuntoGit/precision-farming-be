<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MacchineEAttrezzi extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'farm_id', 'codice', 'nome_macch_attr', 'marca_produttore', 'numero_di_matricola', 'data_acq', 'ore_di_lavoro_alla_registrazione', 'ore_di_lavoro_calcolate', 'tipologia', 'foto', 'modello', 'descrizione', 'utilizzo_di_carburante'];

    public function assicurazione()
    {
        return $this->hasOne(Assicurazione::class, 'macchine_id', 'id');
    }
}
