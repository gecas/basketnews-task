<?php

namespace App\Console\Commands;

use App\Models\Game;
use Illuminate\Console\Command;

class FetchNbaGamesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:fetchGames';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches games from the NBA api';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $url = Game::API_URL;

        $content = json_decode(file_get_contents($url), true);
        $gamesByMonth = $content['lscd'] ?? [];
        if (empty($gamesByMonth)) {
            return;
        }
        foreach ($gamesByMonth as $gameByMonth) {
            $games = $gameByMonth['mscd']['g'] ?? [];
            foreach ($games as $game) {
                $gameData = [];
                $gameData['game_id'] = $game['gid'];
                $gameData['date'] = $game['gdte'];
                $gameData['date_full'] = $game['htm'];
                $gameData['arena'] = $game['an'];
                $gameData['city'] = $game['ac'];
                $gameData['state'] = $game['as'];
                $gameData['home_team_name'] = $game['h']['tn'];
                $gameData['home_team_city'] = $game['h']['tc'];
                $gameData['home_team_short'] = $game['h']['ta'];
                $gameData['home_team_record'] = $game['h']['re'];
                $gameData['home_team_points'] = $game['h']['s'];
                $gameData['away_team_name'] = $game['v']['tn'];
                $gameData['away_team_city'] = $game['v']['tc'];
                $gameData['away_team_short'] = $game['v']['ta'];
                $gameData['away_team_record'] = $game['v']['re'];
                $gameData['away_team_points'] = $game['v']['s'];
                if (!Game::where('game_id', $game['gid'])->exists()) {
                    Game::create($gameData);
                }
            }
        }
    }
}
