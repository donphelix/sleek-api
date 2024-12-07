<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'title', 'description', 'location', 'rent_price', 'is_available',
    ];
}
