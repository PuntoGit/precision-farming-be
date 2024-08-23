<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farms extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','codice', 'nome', 'checklist'];

    public function users()
    {
        return $this->hasOne(User::class, 'farm_id');
    }
}
