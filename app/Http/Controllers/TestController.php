<?php

namespace App\Http\Controllers;

use App\Events\PlayerJoinEvent;
use App\Models\Game;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        dd(Game::find('55f43da0-824b-434b-8dda-5a8ca204ddcc')->creator());
        dd(1);
    }
}
