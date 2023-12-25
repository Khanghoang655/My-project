<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;
use App\Models\FootballMatch;
use App\Notifications\SmsCustomer;
use Http;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MatchController extends Controller
{
    public function index()
    {
        $matches = FootballMatch::withTrashed()->get();

        // Check if $matches is empty
        if ($matches->isEmpty()) {
            return view('admin.admin')->with('matches', []);
        }

        return view('admin.admin')->with('matches', $matches);
    }


    public function updateMatch(Request $request)
{
    $apiKey = config('myconfig.call_api.api_key');
    $apiMatch = config('myconfig.call_api.api_match_url');
    $responseMatches = Http::withHeaders(['X-Auth-Token' => $apiKey])->get($apiMatch);

    $matches = $responseMatches->json()['matches'] ?? [];
    $matchIds = collect($matches)->pluck('id')->all();
    $existingMatches = FootballMatch::whereIn('match_id', $matchIds)->get()->keyBy('match_id');

    foreach ($matches as $match) {
        // Validate the required fields before processing
        $requiredFields = ['homeTeam', 'awayTeam', 'area', 'competition'];
        if (!$this->hasRequiredFields($match, $requiredFields)) {
            continue;
        }

        $homeTeamName = $match['homeTeam']['name'];
        $awayTeamName = $match['awayTeam']['name'];
        $areaName = $match['area']['name'];
        $competitionName = $match['competition']['name'];

        $result = [
            'points_team1' => $match['score']['fullTime']['home'],
            'points_team2' => $match['score']['fullTime']['away'],
        ];

        // Get the existing match record
        $existingMatch = $existingMatches->get($match['id']);

        if (!$existingMatch) {
            // Create a new match record if it does not exist
            FootballMatch::create([
                'match_id' => $match['id'],
                'home_team' => $homeTeamName,
                'away_team' => $awayTeamName,
                'area_name' => $areaName,
                'competition_name' => $competitionName,
                'status' => 0,
                'seat' => 70000,
                'result' => json_encode($result),
                'date_time' => Carbon::parse($match['utcDate'])->toDateTimeString(),
            ]);
        } else {
            $existingMatch->update([
                'result' => json_encode($result),
                'status' =>1,
            ]);
        }
    }

    $competitions = FootballMatch::distinct('competition_name')->pluck('competition_name');

    $selectedCompetition = $request->input('competition', 'all');

    $filteredMatches = ($selectedCompetition !== 'all')
        ? FootballMatch::where('competition_name', $selectedCompetition)->withTrashed()->paginate(10)
        : FootballMatch::withTrashed()->paginate(10);

    return view('admin.sport.admin-sport', [
        'matches' => $filteredMatches,
        'competitions' => $competitions,
        'selectedCompetition' => $selectedCompetition,
        'totalPage' => $filteredMatches->lastPage(),
        'itemPerPage' => $filteredMatches->perPage(),
        'page' => $filteredMatches->currentPage(),
    ]);
}


/**
* Check if the required fields exist in the match data.
*
* @param array $match
* @param array $requiredFields
* @return bool
*/
private function hasRequiredFields(array $match, array $requiredFields)
{
    foreach ($requiredFields as $field) {
        if (!isset($match[$field])) {
            return false;
        }
    }
    return true;
}



    public function restore($id)
    {
        $product = FootballMatch::withTrashed()->where('match_id', $id);
        $product->restore();
        return redirect()->route('admin.index')->with('msg', 'Khoi phuc tran dau thanh cong');
    }
    public function destroy($id)
    {
        FootballMatch::where('match_id', $id)->delete();
        return redirect()->route('admin.index')->with('msg', 'Xoa tran dau thanh cong');
    }
    public function forceDelete($id)
    {
        $matches = FootballMatch::withTrashed()->where('match_id', $id);
        $matches->forceDelete();
        return redirect()->route('admin.index')->with('msg', 'Xoa tran dau thanh cong');
    }
    public function createSlug(Request $request)
    {
        $slug = Str::slug($request->name ?? '');
        return response()->json(['slug' => $slug]);
    }

    public function update(Request $request, string $id)
    {
        $matches = FootballMatch::where('match_id', $id)->firstOrFail();

        $matches->update([
            'home_team' => $request->home_team,
            'away_team' => $request->away_team,
            'home_name_slug' => Str::slug($request->home_team ?? ''),
            'away_name_slug' => Str::slug($request->away_team ?? ''),
        ]);

        return redirect()->route('admin.index')->with('msg', 'Update thanh cong');
    }

    public function detail($id)
    {
        $matches = FootballMatch::where('match_id', $id)->firstOrFail();
        return view('admin.sport.admin-sport-detail')->with('matches', $matches);
    }
}