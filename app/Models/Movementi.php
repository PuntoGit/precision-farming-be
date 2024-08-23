<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movementi extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'farm_id', 'nome_prodotto', 'magazzino_di_stoccaggio', 'q_ta_scaricata', 'q_ta_caricata', 'data', 'rif_fattura', 'causale', 'cliente_fornitore'];
}
