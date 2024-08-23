<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alimentazione extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'farm_id', 'alimenti_id', 'stella_id', 'data', 'quantita', 'motivazione'];

    public function stella()
    {
        return $this->belongsTo(Stella::class);
    }

    public function alimenti()
    {
        return $this->belongsTo(Alimenti::class);
    }
}
