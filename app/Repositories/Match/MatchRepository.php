<?php

namespace App\Repositories\Match;

use App\Interfaces\Match\MatchRepositoryInterface;
use App\Models\Matches;
use App\Models\MatchScores;
use App\Repositories\BaseEloquentRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
/**
 * Class MemberRepository.
 */
class MatchRepository extends BaseEloquentRepository implements MatchRepositoryInterface
{

    protected $model = Matches::class;
    private $teamA = 0;
    private $teamB = 0;


    public function __construct(Matches $model)
    {
        $this->model = $model;
    }

  public function startMatch($id){
    try {
       $match = Matches::find($id);
        $match->update(['is_live' => 1]);

          MatchScores::create([
                'matches_id'=>$id,
                'team_a_score'=>0,
                'team_b_score'=>0,
                'created_by'=> Auth::user()->id
            ]);
        return true;
    } catch (\Throwable $th) {
       Log::error($th);
    }

  }

    public function endMatch($id){
           try {
       $match = Matches::find($id);
        $match->update(['is_live' => 2]);
        return true;
    } catch (\Throwable $th) {
       Log::error($th);
    }
    }


    public function updateTeamScore(array $data)
    {
        try {
             $score = MatchScores::where('matches_id', $data['id']);
             $getScore = $score->get();

        if (count($getScore) != 0) {
            if ($data['data']['team'] == 'team_a') {
                if ($data['data']['action'] == 'add') {
                    $teamA = $getScore[0]->team_a_score + 1;
                } else {
                    $teamA = $getScore[0]->team_a_score - 1;
                }

                $score->update(['team_a_score'=>$teamA]);
            }else{
                   if ($data['data']['action'] == 'add') {
                    $teamB = $getScore[0]->team_b_score + 1;
                } else {
                    $teamB = $getScore[0]->team_b_score - 1;
                }
                $score->update(['team_b_score'=>$teamB]);
            }
        }else{
            if ($data['data']['team'] == 'team_a') {
               $this->teamA++;
            }else{
             $this->teamB++;
            }

            MatchScores::create([
                'matches_id'=> $data['id'],
                'team_a_score'=>$this->teamA,
                'team_b_score'=>$this->teamB,
                'created_by'=> Auth::user()->id
            ]);
        }
        return true;
        } catch (\Throwable $th) {
           Log::error($th);
        }

    }
}
