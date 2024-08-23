<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animali extends Model
{
    use HasFactory;
    
    protected $table = 'animalis';

    protected $fillable = ['stella_id','user_id', 'farm_id','codice','tipologia', 'sesso', 'specie','razza','eta_gg','eta_all_acquisto','note','nato_e_allevato','allevato_modo', 'razza_a_rischio', 'riproduzione', 'causa_inserimento'];

    public function stella()
    {
        return $this->belongsTo(Stella::class);
    }

    
    public function assistenza_sanitarias()
    {
        return $this->hasOne(AssistenzaSanitaria::class, 'animali_id');
    }
}
