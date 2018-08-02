<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Super7UserPick extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'match_1_id',
        'pick_1_id',
        'match_2_id',
        'pick_2_id',
        'match_3_id',
        'pick_3_id',
        'match_4_id',
        'pick_4_id',
        'match_5_id',
        'pick_5_id',
        'match_6_id',
        'pick_6_id',
        'match_7_id',
        'pick_7_id',
        'week_id'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    /**
     * Relationships
     */
}
