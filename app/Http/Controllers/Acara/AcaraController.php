<?php

namespace App\Http\Controllers\Acara;

use App\Http\Controllers\Controller;
use App\Models\FinalModel;
use App\Models\Team;
use App\Models\TeamCard;
use Illuminate\Http\Request;

class AcaraController extends Controller
{
    public function index()
    {
        $teams = Team::all();

        $results = [];

        foreach ($teams as $team) {
            $tempSubmmision = FinalModel::where('team_id', $team->id)
                                    ->first();
            $results += [
                $team->id => [
                    'name' => $team->name,
                    'submission' => $tempSubmmision == null ? null : $tempSubmmision,
                ]
            ];
        }
//        dd($results);
        return view('acara.index', compact('results'));
    }

    public function show(Team $team)
    {
        $result = [];

        $tempSubmmision = FinalModel::join('strategies', 'finals.strategy_id', '=', 'strategies.id')
            ->where('team_id', $team->id)
            ->select(
                'finals.hpp',
                'finals.laba_kotor',
                'finals.laba_bersih',
                'finals.target_cost',
                'strategies.strategy',
                'strategies.term',
                'strategies.condition'
            )
            ->first();
        $card = TeamCard::join('cards', 'team_cards.card_id', '=', 'cards.id')
            ->where('team_id', $team->id)
            ->select('cards.title', 'cards.desc', 'cards.type')
            ->first();
        $hargaJual = number_format(
            $team->questions()->get()->sum('pivot.score') * 150000,
            0,
            '.',
            ','
        );
        $result += [
            'submission' => $tempSubmmision,
            'card' => $card,
            'harga_jual' => $hargaJual
        ];
//        dd($result);

        return view('acara.show', compact('result'));
    }
}
