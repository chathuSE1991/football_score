<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MatchRequest;
use App\Interfaces\Match\MatchRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Events\ScoreUpdated;

class MatchScoreController extends Controller
{
    use ResponseTrait; // Trait for http response
    protected $matchRepository;
    public function __construct(MatchRepositoryInterface $matchRepository)
    {
        $this->matchRepository = $matchRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getMatch = $this->matchRepository->allList([],  [],  [], ['status' => 1], '', '');

        return view('match_score.list', compact('getMatch'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(MatchRequest $request) {}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $getMatch = $this->matchRepository->allList([],  ['matchScores'],  [], ['id' => $id], '', '');

        return view('match_score.show', compact('getMatch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    /**
     * Start the match by updating its status.
     *
     * @param  int  $id  The ID of the match to start
     * @return void
     */
    public function startMatch(string $id)
    {

        // Call the repository method to update the match status to 'started'
        $updateStatus = $this->matchRepository->startMatch($id);

        // If the update was successful, refresh the match list
        if ($updateStatus) {
               $matchData = $this->matchRepository->allList([],  ['matchScores'],  [], ['is_live' => 1], '', '');
            $this->broadcastScore($matchData);
            return $this->successResponse('Data has been sent successfully', 200);
        } else {
            return $this->errorResponse('System error', Response::HTTP_BAD_REQUEST);
        }
    }


/**
 * End a football match by updating its status.
 *
 * @param string $id  The ID of the match to end.
 * @return \Illuminate\Http\JsonResponse
 */
public function endMatch(string $id)
{
    // Call the repository method to end the match
    $endStatus = $this->matchRepository->endMatch($id);

    if ($endStatus) {
         $matchData = $this->matchRepository->allList([],  ['matchScores'],  [], ['is_live' => 1], '', '');
            $this->broadcastScore($matchData);
        return $this->successResponse('Data has been sent successfully', 200);
    } else {

        return $this->errorResponse('System error', Response::HTTP_BAD_REQUEST);
    }
}

    public function updateScore(Request $request, string $id)
    {
        $request->validate([
            'team' => 'required',
        ], [
            'team.required' => 'Please select a team before submitting.',
        ]);



        $updateScore = $this->matchRepository->updateTeamScore([
            'id' => $id,
            'data' => $request->all()
        ]);
        if ($updateScore) {
            $matchData = $this->matchRepository->allList([],  ['matchScores'],  [], ['is_live' => 1], '', '');

            $this->broadcastScore($matchData);

            $getMatch = $this->matchRepository->allList([],  ['matchScores'],  [], ['id' => $id], '', '');

            return view('match_score.show', [
                'getMatch' => $getMatch,
                'success' => 'Match added successfully.'
            ]);


        }
    }

    private function broadcastScore($data)
    {
        broadcast(new ScoreUpdated($data));
        // event(new ScoreUpdated($data[0]['matchScores']->team_a_score, $data[0]['matchScores']->team_b_score, $data[0]['is_live'], $data[0]['match_date']));
    }
}
