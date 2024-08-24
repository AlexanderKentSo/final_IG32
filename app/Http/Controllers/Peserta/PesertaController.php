<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $tim = auth()->user()->team;
        $kartu = $tim->cards()->first();
        $hargaJual = number_format(
            $tim->questions()->get()->sum('pivot.score') * 150000,
            0,
            ',',
            '.'
        );

        return view('peserta.index', compact(
            'kartu',
            'tim',
            'hargaJual'
        ));
    }
}
