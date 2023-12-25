<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Http;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function index()
    {
        $competition = Competition::withTrashed()->get();

        // Check if $competition is empty
        if ($competition->isEmpty()) {
            return view('admin.admin')->with('matches', []);
        }

        return view('admin.admin')->with('matches', $competition);
    }
    public function updateCompetition(Request $request)
    {
        $apiKey = config('myconfig.call_api.api_key');
        $apiCompetition = config('myconfig.call_api.api_competition_url');
        $responseMatches = Http::withHeaders(['X-Auth-Token' => $apiKey])->get($apiCompetition);

        $competitions = $responseMatches->json()['matches'] ?? [];
        $competitionID = collect($competitions)->pluck('id')->all();
        $existingCompetition = Competition::whereIn('id', $competitionID)->get()->keyBy('id');

        foreach ($competitions as $competition) {
            $requiredFields = ['name', 'code', 'emblem'];
            if (!$this->hasRequiredFields($competition, $requiredFields)) {
                continue;
            }
            $competitionName = $competition['name'];
            $competitionShortName = $competition['code'];
            $competitionImage = $competition['emblem'];

            $existingCompetition = $existingCompetition->get($competition['id']);
            if (!$existingCompetition) {
                Competition::create([
                    'id' => $competition['id'],
                    'name' => $competitionName,
                    'short_name' => $competitionShortName,
                    'emblem' => $competitionImage,
                    'start_date'=>$competition['currentSeason']['startDate'],
                    'end_date'=>$competition['currentSeason']['endDate'],
                    'current_matchday'=>$competition['currentSeason']['current_matchday'],
                    'winner'=>$competition['currentSeason']['winner']
                ]);
            }else{
                $existingCompetition->update([
                    'winner'=>$competition['currentSeason']['winner'],
                ]);

            }
        }
    }
}
