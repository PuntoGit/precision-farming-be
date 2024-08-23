<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alimenti extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'farm_id', 'nome', 'provenienza', 'codice', 'bio', 'tipologia', 'tipologia_mangime'];

    public function alimentazione()
    {
        return $this->hasOne(Alimentazione::class, 'alimenti_id');
    }
}
