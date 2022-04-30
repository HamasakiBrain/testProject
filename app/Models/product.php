<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'code', 'name', 'level1', 'level2', 'level3',
        'price', 'priceCP', 'count', 'properties',
        'joint', 'unit', 'image', 'showMain',
        'description'
    ];
}
