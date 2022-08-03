<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    protected $guarded = ['id'];

        /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'object',
    ];
}
