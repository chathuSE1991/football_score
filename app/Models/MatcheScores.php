<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatcheScores extends Model
{
    protected $table = 'matche_scores';
    protected $fillable = [
        'matche_id',
        'team_a_score',
        'team_b_score',
        'created_by',
    ];
    protected $primaryKey = 'id';
}
