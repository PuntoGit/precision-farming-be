<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capetti extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'capettis';
    
    protected $fillable = ['farm_id', 'nome', 'capetti_licence', 'capetti_mac_base', 'capetti_mac_sonda', 'temp_low', 'temp_high', 'hum_low', 'hum_high'];

    protected $casts = [
        'temp_low' => 'decimal:2', 
        'temp_high' => 'decimal:2',
        'hum_low' => 'decimal:2', 
        'hum_high' => 'decimal:2'
    ];
}
