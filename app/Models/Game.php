<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    const API_URL = 'http://data.nba.com/data/10s/v2015/json/mobile_teams/nba/2020/league/00_full_schedule.json';

    protected $fillable = [
        'game_id',
        'date',
        'date_full',
        'arena',
        'city',
        'state',
        'home_team_name',
        'home_team_city',
        'home_team_short',
        'home_team_record',
        'home_team_points',
        'away_team_name',
        'away_team_city',
        'away_team_short',
        'away_team_record',
        'away_team_points'
    ];

    protected $hidden = ['date_full'];

    use HasFactory;
}
