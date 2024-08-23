<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckList extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'farm_id', 'checklist'];

    protected $casts = [
        'checklist' => 'array'
    ];
}
