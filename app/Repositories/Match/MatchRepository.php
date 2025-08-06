<?php

namespace App\Repositories\Match;

use App\Interfaces\Match\MatchRepositoryInterface;
use App\Models\Matches;

use App\Repositories\BaseEloquentRepository;

/**
 * Class MemberRepository.
 */
class MatchRepository extends BaseEloquentRepository implements MatchRepositoryInterface
{

    protected $model = Matches::class;


    public function __construct(Matches $model)
    {
        $this->model = $model;
    }

    public function findTodo(){
        return $this->model::orderBy('created_at', 'desc')->where('status',0)->take(5)->get();

    }
}
