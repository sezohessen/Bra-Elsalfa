<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameRoomController extends Controller
{
    public function index()
    {
        // Retrieve the room ID from the session
        $roomId = session('game_room_id');

        // Pass the room ID to the view
        return view('game.game-room', ['roomId' => $roomId]);
    }
}
