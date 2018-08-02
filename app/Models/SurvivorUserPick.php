<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurvivorUserPick extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'team_id', 'match_id', 'week_id'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    /**
     * Relationships
     */
}
