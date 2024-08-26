<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\FinalModel;
use App\Models\Strategy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function finalIndex()
    {
        $tim = auth()->user()->team;
        $check = $tim->final()->first();

        if ($check != null) {
            return redirect(route('peserta.index'))->with('failed', 'You has submitted the answer');
        }

        $kartu = $tim->cards()->first();
        $hargaJual = number_format(
            $tim->questions()->get()->sum('pivot.score') * 150000,
            0,
            ',',
            '.'
        );

        $strategies = Strategy::all();

//        dd($kartu->card->title);

        return view('peserta.final.index', compact(
            'kartu',
            'tim',
            'hargaJual',
            'strategies'
        ));
    }

    public function getStrategy(Strategy $strategy)
    {
        return response()->json(compact('strategy'));
    }

    public function submit(Request $request)
    {
        $team = auth()->user()->team;
        $validator = Validator::make($request->all(), [
            'strategy_id' => ['required'],
            'hpp' => ['required', 'numeric'],
            'laba_kotor' => ['required', 'numeric'],
            'laba_bersih' => ['required', 'numeric'],
            'target_cost' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return back()->with('failed', 'Silahkan masukkan data dengan lengkap');
        }

        FinalModel::create([
            'team_id' => $team->id,
            'strategy_id' => $request->get('strategy_id'),
            'hpp' => $request->get('hpp'),
            'laba_kotor' => $request->get('laba_kotor'),
            'laba_bersih' => $request->get('laba_bersih'),
            'target_cost' => $request->get('target_cost'),
        ]);

        return redirect(route('peserta.index'))->with('success', 'You have submitted your answer');
    }
}
