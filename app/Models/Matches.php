<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    protected $table = 'matches';
    protected $fillable = [
        'name',
        'team_a',
        'team_b',
        'match_date',
        'is_live',
        'created_by',
        'status'
    ];
    protected $primaryKey = 'id';
}
