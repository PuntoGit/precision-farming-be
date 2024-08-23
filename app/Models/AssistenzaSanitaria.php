<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssistenzaSanitaria extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'farm_id', 'animali_id', 'comprovata_necessita','tipologia_trattamento','data'];

    public function animali()
    {
        return $this->belongsTo(Animali::class);
    }
    
}
