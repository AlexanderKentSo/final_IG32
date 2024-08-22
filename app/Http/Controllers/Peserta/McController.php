<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\McContest;
use App\Models\McQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class McController extends Controller
{
    public function index($number)
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

        $questions = McQuestion::orderBy('number', 'ASC')->get();
        $nomor_terakhir = $questions->max('number');
        $previous = $questions->where('number', '<', $number)->max('number');
        $next = $questions->where('number', '>', $number)->min('number');

        $questionNow = $questions->where('number', $number)->first();
        $currentSubmission = $questionNow->teams()
                                ->where('team_id', Auth::user()->team->id)
                                ->first();

        return view('peserta.mc.index', compact(
            'questions',
            'previous',
            'next',
            'questionNow',
            'currentSubmission'
        ));
    }
}
