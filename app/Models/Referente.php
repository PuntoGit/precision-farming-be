<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referente extends Model
{
    use HasFactory;

    protected $fillable = ['referente', 'email', 'cellulare', 'telefono'];
}
