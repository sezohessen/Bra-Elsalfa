<?php

namespace App\Http\Controllers;

use App\Events\PlayerJoinEvent;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        event(new PlayerJoinEvent());
        dd(1);
    }
}
