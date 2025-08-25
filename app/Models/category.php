<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'name',
        'discription',
        'image',
        'sku',
        'price',
    ];
}
