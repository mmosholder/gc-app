<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Super7UserEntry extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'team_name'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    /**
     * Relationships
     */
}
