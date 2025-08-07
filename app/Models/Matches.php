<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

      public function matchScores(): HasOne
    {
        return $this->hasOne(MatchScores::class);
    }
}
