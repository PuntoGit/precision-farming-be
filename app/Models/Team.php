<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'farm_id', 'codice', 'deactivate', 'tipologia_di_contratto', 'qualifica', 'costo_orario', 'inizio_assunzione', 'fine_assunzione', 'anagrafica_id', 'documento_id'];

    public function anagrafica() {
        return $this->belongsTo(Anagrafica::class);
    }

    public function documento() {
        return $this->belongsTo(Documento::class);
    }
}
