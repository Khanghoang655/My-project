<?php

namespace Database\Factories;

use App\Models\Competition;
use App\Models\FootballMatch;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FootballMatchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $competitionData = Competition::inRandomOrder()->first();

        if (optional($competitionData)->clubs->count() < 2) {
            return [];
        }

        $uniqueTeamNames = optional($competitionData)->clubs->pluck('name')->unique();

        if ($uniqueTeamNames->count() < 2) {
            return [];
        }

        $randomClubs = $uniqueTeamNames->random(2);

        $currentDateTime = Carbon::now('Asia/Ho_Chi_Minh');
        $futureDateTime = $currentDateTime->addMinutes(120);

        $result = [
            'points_team1' => null,
            'points_team2' => null,
        ];

        return [
            'match_id' => mt_rand(10000, 99999),
            'home_team' => $randomClubs[0],
            'away_team' => $randomClubs[1],
            'result' => json_encode($result, JSON_UNESCAPED_SLASHES),
            'date_time' => $futureDateTime->format('Y-m-d H:i:s'),
            'competition_name' => optional($competitionData)->name_of_competition,
            'emblem_home' => optional($competitionData)->clubs->where('name', $randomClubs[0])->first()->crest,
            'emblem_away' => optional($competitionData)->clubs->where('name', $randomClubs[1])->first()->crest,
            'competition_id' => optional($competitionData)->id,
        ];
    }

}
