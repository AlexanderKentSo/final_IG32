<?php

namespace App\Http\Controllers\MiniGame;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MiniGameController extends Controller
{
    public function index()
    {


        return view('minigame.index');
    }
}
