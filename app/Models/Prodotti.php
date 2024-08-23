<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ConcimePercentage;
use App\Models\ConcimeExtra;

class Prodotti extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'farm_id', 'codice', 'nome_prodotto', 'descrizione', 'tipologia', 'iva', 'categoria', 'udm', 'p_netto', 'p_lordo', 'note', 'magazzino_di_stoccaggio', 'giacenza_iniziale', 'soglia_minima', 'tipologia_prodotto', 'autorizzato_biologico', 'q_ta_scaricata', 'q_ta_caricata', 'data_ultimo_carico', 'data_ultimo_scarico', 'rif_fattura', 'causale', 'cliente_fornitore', 'concime_tipologia'];
    
    protected $casts = [
        'giacenza_iniziale' => 'decimal:2', 
        'soglia_minima' => 'decimal:2'
    ];
    
    public function concimePercentage()
    {
        return $this->hasOne(ConcimePercentage::class, 'prodotti_id', 'id');
    }

    public function concimeExtras()
    {
        return $this->hasOne(ConcimeExtra::class, 'prodotti_id', 'id');
    }
}
