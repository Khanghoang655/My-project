<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRequest;
use App\Models\FootballMatch;
use Http;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MatchController extends Controller
{
    public function indexPagination(Request $request)
    {
        $itemPerPage = 3;
        $totalItems = DB::table('football_matches')->count();
        $totalPage = ceil($totalItems / $itemPerPage);
        $page = $request->page ?? 1;

        $index = ($page - 1) * $itemPerPage;

        // Sử dụng Eloquent thay vì Query Builder
        $matches = FootballMatch::offset($index)
            ->limit($itemPerPage)
            ->get();
        dd($totalPage);
        return view('admin.sport.admin-sport', [
            'matches' => $matches,
            'totalPage' => $totalPage,
            'itemPerPage' => $itemPerPage,
            'page' => $page
        ]);

    }

    public function index()
    {
        // $products = FootballMatch::with('productCategory')->withTrashed()->get();
        $matches = FootballMatch::withTrashed()->get();
        ;

        // dd($products);

        return view('admin.sport.admin-sport')->with('matches', $matches);
    }

    public function updateMatch(Request $request)
    {
        $apiKey = 'a6c8b22c5f6942f48f5a4ca296bd42e8';
        $apiUrl = 'https://api.football-data.org/v4/matches';

        $response = Http::withHeaders([
            'X-Auth-Token' => $apiKey
        ])->get($apiUrl);

        $matches = $response->json()['matches'] ?? [];

        foreach ($matches as $match) {
            // Danh sách các trường thiếu
            $missingFields = [];

            if (
                isset(
                $match['homeTeam']['name'],
                $match['awayTeam']['name'],
                $match['area']['name'],
                $match['competition']['name'],
            )
            ) {

                $homeTeamName = $match['homeTeam']['name'];
                $awayTeamName = $match['awayTeam']['name'];
                $areaName = $match['area']['name'];
                $competitionName = $match['competition']['name'];
                $result = [
                    'points_team1' => $match['score']['fullTime']['home'],
                    'points_team2' => $match['score']['fullTime']['away'],
                ];

                $existingMatch = FootballMatch::where('match_id', $match['id'])->first();

                if ($existingMatch) {
                    $existingMatch->update([
                        'home_team' => $homeTeamName,
                        'away_team' => $awayTeamName,
                        'area_name' => $areaName,
                        'competition_name' => $competitionName,
                        'status' => 1, // Cập nhật status thành 1
                        'seat' => 70000,
                        'result' => json_encode($result),
                        'date_time' => Carbon::parse($match['utcDate'])->toDateTimeString(),
                    ]);
                } else {
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
                }
            } else {
                if (!isset($match['homeTeam']['name'])) {
                    $missingFields[] = 'homeTeam.name';
                }
                if (!isset($match['awayTeam']['name'])) {
                    $missingFields[] = 'awayTeam.name';
                }
                if (!isset($match['area']['name'])) {
                    $missingFields[] = 'area.name';
                }
                if (!isset($match['competition']['name'])) {
                    $missingFields[] = 'competition.name';
                }

                $message = 'Some fields are missing for match ID: ' . $match['id'] . '. Missing fields: ' . implode(', ', $missingFields);
                dd($message);
            }

        }
        // Fetch unique competition names
      // Fetch unique competition names
$uniqueCompetitions = FootballMatch::distinct('competition_name')->pluck('competition_name');

// Get the selected competition from the request or set it to 'all' if not present
$selectedCompetition = $request->input('competition', 'all');

// Lọc matches theo competition đã chọn hoặc hiển thị tất cả nếu không có competition được chọn
$filteredMatches = ($selectedCompetition !== 'all')
    ? FootballMatch::where('competition_name', $selectedCompetition)->withTrashed()->get()
    : FootballMatch::withTrashed()->get();

return view('admin.sport.admin-sport', [
    'matches' => $filteredMatches,
    'competitions' => $uniqueCompetitions,
    'selectedCompetition' => $selectedCompetition,
]);





    }

    public function restore($id)
    {
        $product = FootballMatch::withTrashed()->where('match_id', $id);
        $product->restore();
        return redirect()->route('admin.index')->with('msg', 'Khoi phuc san pham thanh cong');
    }
    public function destroy($id)
    {
        FootballMatch::where('match_id', $id)->delete();
        return redirect()->route('admin.index')->with('msg', 'Xoa san pham thanh cong');
    }
    public function forceDelete($id)
    {
        $matches = FootballMatch::withTrashed()->where('match_id', $id);
        $matches->forceDelete();
        return redirect()->route('admin.index')->with('msg', 'Xoa san pham thanh cong');
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
