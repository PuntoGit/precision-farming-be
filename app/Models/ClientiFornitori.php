<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientiFornitori extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'farm_id', 'codice', 'anagrafica_id', 'documento_id', 'referente_id', 'type'];


    public function anagrafica() {
        return $this->belongsTo(Anagrafica::class);
    }

    public function referente() {
        return $this->belongsTo(Referente::class);
    }

    public function documento() {
        return $this->belongsTo(Documento::class);
    }
}
