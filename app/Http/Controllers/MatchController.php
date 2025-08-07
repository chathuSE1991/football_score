<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MatchRequest;
use App\Interfaces\Match\MatchRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MatchController extends Controller
{
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
          $getMatch = $this->matchRepository->allList();

        return view('match.list',compact('getMatch'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('match.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MatchRequest $request)
    {
        $this->matchRepository->store([
            'name' => $request->name,
            'team_a' => $request->team_a,
            'team_b' => $request->team_b,
            'match_date' => $request->match_date,
            'status' => $request->status,
            'is_live' => 0,
            'created_by' => Auth::user()->id
        ]);
        return redirect()->route('match.list')
            ->with('success', 'Match added successfully.');
    }

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
    public function mainPage(){
         $matchData = $this->matchRepository->allList([],  ['matchScores'],  [], ['is_live' => 1], '', '');
          return view('welcome', compact('matchData'));
    }
}
