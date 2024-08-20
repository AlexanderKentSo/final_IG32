<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
//        $hargaJual =
        $tim = auth()->user()->team;
        $kartu = $tim->cards()->orderBy('created_at', "DESC")->first();
//        dd($kartu->card);
        return view('peserta.index', compact(
            'kartu',
            'tim'
        ));
    }
}
