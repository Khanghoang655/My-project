<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Http;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class CompetitionController extends Controller
{
    public function index()
    {
        $competition = Competition::withTrashed()->get();

        // Check if $competition is empty
        if ($competition->isEmpty()) {
            return view('admin.admin')->with('competitions', []);
        }

        return view('admin.admin')->with('competitions', $competition);
    }
    public function updateCompetition(Request $request)
    {
        $apiKey = config('myconfig.call_api.api_key');
        $apiCompetition = config('myconfig.call_api.api_competition_url');
        $responseMatches = Http::withHeaders(['X-Auth-Token' => $apiKey])->get($apiCompetition);

        $competitions = $responseMatches->json()['competitions'] ?? [];


        // Check if 'competitions' key exists
        if (!empty($competitions)) {
            $competitionID = collect($competitions)->pluck('id')->all();
            foreach ($competitions as $competition) {
                $requiredFields = ['name', 'code', 'emblem'];

                // Check if id exists in $competitionID array
                if (!$this->hasRequiredFields($competition, $requiredFields)) {
                    continue;
                }

                $competitionName = $competition['name'];

                $competitionShortName = $competition['code'];
                $competitionImage = $competition['emblem'];
                $winner = [
                    'name' => $competition['currentSeason']['winner']['name'] ?? null,
                    'crest' => $competition['currentSeason']['winner']['crest'] ?? null,
                ];
                // Check if id exists in the database
                $existingCompetition = Competition::where('name_of_competition', $competitionName)->first();
                if (!$existingCompetition) {
                    Competition::create([
                        'name_of_competition' => $competitionName,
                        'short_name' => $competitionShortName,
                        'emblem' => $competitionImage,
                        'start_date' => Carbon::parse($competition['currentSeason']['startDate']),
                        'end_date' => Carbon::parse($competition['currentSeason']['endDate']),
                        'current_matchday' => $competition['currentSeason']['currentMatchday'],
                        'winner' => json_encode($winner),
                        'status' => 0
                    ]);
                } else {
                    $existingCompetition->update([
                        'winner' => json_encode($winner),
                    ]);
                    if (Carbon::parse($competition['currentSeason']['endDate'])->isToday()) {
                        $existingCompetition->update([
                            'status' => 1,
                        ]);
                    }
                }
            }
        }

        $competition = Competition::withTrashed()->paginate(5);
        return view('admin.competition.Admin-compettion', [
            "competition" => $competition,
            'totalPage' => $competition->lastpage(),
            'itemPerPage' => $competition->perPage(),
            'page' => $competition->currentPage(),
        ]);
    }

    private function hasRequiredFields(array $competition, array $requiredFields)
    {
        $requiredFields[] = 'id'; // Thêm trường id vào mảng requiredFields
        $missingFields = array_diff($requiredFields, array_keys($competition));
        return empty($missingFields);
    }
    public function destroy($id)
    {
        $competition = Competition::find($id);

        if ($competition) {
            $competition->delete();
            return redirect()->route('admin.update-competition')->with('msg', 'Xóa thành công giải đấu');
        } else {
            return redirect()->route('admin.update-competition')->with('error', 'Không tìm thấy giải đấu');
        }
    }
    public function detail($id)
    {
        $competition = Competition::where('id', $id)->firstOrFail();
        return view('admin.competition.admin-competition-detail')->with('competition', $competition);
    }
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'name_of_competition' => [
            'required',
            'string',
            'max:255',
            Rule::unique('competition')->ignore($id,'id'),
        ],
        'short_name' => [
            'required',
            'string',
            'max:255',
            Rule::unique('competition')->ignore($id,'id'),
        ],
            'start_date' => [
                'required',
                'date_format:Y-m-d',
                'lte:today()', // So sánh start_date với ngày hiện tại
                'after_or_equal:' . now()->toDateString(),
            ],
            'end_date' => [
                'required',
                'date_format:Y-m-d',
                'after:start_date',
            ],
        ]);
        $competition = Competition::where('id', $id)->firstOrFail();

        // Update the match data
        $competition->update([
            'name_of_competition' => $request->name_of_competition,
            'short_name' => $request->short_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('admin.competition.update', ['id' => $id])->with('msg', 'Cập nhật thành công');
    }
}
