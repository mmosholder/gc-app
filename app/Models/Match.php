<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'home_id', 'away_id', 'week_id', 'spread', 'winner_id', 'result'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    /**
     * Relationships
     */
}
