<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Animali;
use App\Models\Alimentazione;

class Stella extends Model
{
    use HasFactory;

    protected $table = 'stellas';

    protected $fillable = ['user_id', 'farm_id', 'codice', 'nome', 'area_coperta','tenuta_pavimentazione','areazione_adeguata','la_sezione','tecnica_alimentazione','illuminazione','vengono_utilizzati','area_scoperta','terreno_salubre','terreno_bio'];
    
    public function animali()
    {
        return $this->belongsTo(Animali::class, 'stella_id');
    }

    public function alimentazione()
    {
        return $this->hasOne(Alimentazione::class, 'stella_id');
    }
}
