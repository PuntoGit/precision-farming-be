<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coltivazione extends Model
{
    use HasFactory;

    protected $fillable = ['lotti_id', 'coltivazione', 'data_di_impianto', 'certificazione', 'numero_anni_di_produzione', 'data_inizio_fioritura', 'data_fine_fioritura', 'data_prima_raccolta', 'produzione_prevista', 'lunghezza', 'larghezza', 'numero_di_piante', 'note'];

    public function lottidicampo()
    {
        return $this->belongsTo(LottiDiCampo::class);
    }
}
