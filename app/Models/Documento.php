<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = ['tipo_di_documento', 'numero', 'ente_di_rilascio', 'data_rilascio', 'data_scadenza', 'data_di_nascita', 'comune_di_nascita'];
}
