<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assicurazione extends Model
{
    use HasFactory;

    protected $fillable = ['macchine_id', 'compagnia_assicurativa', 'data_di_scadenza', 'la_rinnovo_ogni', 'avvisami_alla_scadenza'];

    public function macchineeattrezzi()
    {
        return $this->belongsTo(MacchineEAttrezzi::class);
    }

}
