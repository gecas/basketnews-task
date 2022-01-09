<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GamesController
{
    public function filter(Request $request)
    {
        $date = $request->get('date');
        if (!$date) {
            return response()->json([
                'success' => false,
                'games' => []
            ]);
        }

        $games = Game::where('date', $date)->get();
        return response()->json([
            'success' => true,
            'games' => [$date => $games]
        ]);
    }
}
