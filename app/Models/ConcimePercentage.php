<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prodotti;

class ConcimePercentage extends Model
{
    use HasFactory;

    protected $fillable = ['azoto', 'fosforo', 'potassio', 'calcio', 'magnesio', 'zolfo'];

    public function prodotti()
    {
        return $this->belongsTo(Prodotti::class);
    }
}
