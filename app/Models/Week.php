<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start', 'end'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    /**
     * Relationships
     */

}
