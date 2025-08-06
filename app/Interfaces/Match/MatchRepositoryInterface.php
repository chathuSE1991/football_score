<?php

namespace App\Interfaces\Match;
use App\Interfaces\BaseEloquentRepositoryInterface;

interface MatchRepositoryInterface  extends BaseEloquentRepositoryInterface
{
  public function findTodo();
}
