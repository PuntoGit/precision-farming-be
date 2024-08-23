<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazzini extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'farm_id', 'codice', 'nome', 'note'];
}
