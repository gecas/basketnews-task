<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PagesController
{
    public function index()
    {
        $count = Game::count();
        $dates = DB::table('games')->distinct()->pluck('date')->toArray();
        $seconds = 60*60*24;
        $games = Cache::remember('games', $seconds, function () {
            return Game::all()->groupBy('date');
        });
        return view('pages.index', compact('games', 'count', 'dates'));
    }
}
