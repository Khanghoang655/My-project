<?php
return [
    'call_api'=>[
        'api_match_url'=>env('API_MATCH_URL','https://api.football-data.org/v4/matches'),
        'api_competition_url'=>env('API_COMPETITION_URL','http://api.football-data.org/v4/competitions'),
        'api_club_url'=>env('API_CLUB_URL','http://api.football-data.org/v4/teams'),
        'api_key'=>env('API_KEY','a6c8b22c5f6942f48f5a4ca296bd42e8')
    ]
];