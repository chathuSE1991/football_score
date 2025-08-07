<?php

namespace App\Interfaces\Match;
use App\Interfaces\BaseEloquentRepositoryInterface;

interface MatchRepositoryInterface  extends BaseEloquentRepositoryInterface
{
  public function startMatch($id);
  public function updateTeamScore(array $data);
  public function endMatch($id);
}
