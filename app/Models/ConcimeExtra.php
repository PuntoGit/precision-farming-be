<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prodotti;

class ConcimeExtra extends Model
{
    use HasFactory;

    protected $fillable = ['ferro', 'manganese', 'molibdeno', 'rame', 'boro', 'zinco', 'nichel', 'sodio', 'selenio', 'alluminio', 'silicio'];

    public function prodotti()
    {
        return $this->belongsTo(Prodotti::class);
    }
}
