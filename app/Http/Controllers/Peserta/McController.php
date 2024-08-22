<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\McContest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class McController extends Controller
{
    public function index()
    {
        $team = Auth::user()->team;
        $contest = McContest::where('team_id', $team->id)->first();
        if ($contest == null) {
            $contest = McContest::create([
                'team_id' => $team->id,
                'total_score' => 0.0
            ]);
        } else if ($contest->waktu_selesai != null) {
            return redirect(route('peserta.index'))->with('failed', 'Jawaban Pilihan Ganda sudah dikumpulkan!');
        }

        return view('peserta.mc.index');
    }
}
