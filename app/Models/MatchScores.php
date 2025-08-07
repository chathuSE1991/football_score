<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchScores extends Model
{
    protected $table = 'match_scores';
    protected $fillable = [
        'matches_id',
        'team_a_score',
        'team_b_score',
        'created_by',
    ];
    protected $primaryKey = 'id';
}
