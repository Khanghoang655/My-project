<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\FootballMatch;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $matches = FootballMatch::all();
        $competitions = Competition::all();
        return view('client.index',[
            'matches'=>$matches,
            'competitions' => $competitions
        ]);

    }
    public function searchSuggestions(Request $request)
    {
        $query = $request->input('query');
        $suggestions = Competition::where('name_of_competition', 'like', "%$query%")->get();
        return response()->json($suggestions);
    }
    public function competitionDetail($id)
    {
        $competition= Competition::where('id',$id)->first();
        $competitions = Competition::all();
        return view('client.sport.competition-detail',[
            'competition' => $competition,
            'competitions' => $competitions
        ]);
    }
    public function matchesSeat($id)
    {
        $matches = FootballMatch::where('id', $id)->first();
    }


}
