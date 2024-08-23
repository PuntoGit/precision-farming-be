<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTerreni extends Model
{
    use HasFactory;

    protected $fillable = ['area_graf_ha', 'area_cat_ha', 'sez', 'foglio', 'particelle', 'sub', 'comune', 'proprietario'];
}
