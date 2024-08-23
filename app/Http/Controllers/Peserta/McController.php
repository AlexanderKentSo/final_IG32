<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\McContest;
use App\Models\McQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class McController extends Controller
{
    public function authorizeAccess($contest)
    {
        if ($contest->waktu_selesai <= Carbon::now() || $contest->waktu_kumpul != null)
        {
            abort(405, 'Contest Time is Over');
        }
    }

    public function index($number)
    {
        // just in case
        if ($number < 1 || $number > 35 || (!is_numeric($number))) {
            return redirect(route('peserta.mc.index', ['number' => 1]));
        }

        $team = Auth::user()->team;
        $contest = McContest::where('team_id', $team->id)->first();
        if ($contest == null) {
            $contest = McContest::create([
                'team_id' => $team->id,
                'waktu_selesai' => Carbon::now()->addMinute(8)
            ]);
        } else if ($contest->waktu_kumpul != null) {
            return redirect(route('peserta.index'))->with('failed', 'Contest Time is Over');
        }

        $this->authorizeAccess($contest);

        $questions = McQuestion::orderBy('number', 'ASC')->get();
        $last_number = $questions->max('number');
        $previous = $questions->where('number', '<', $number)->max('number');
        $next = $questions->where('number', '>', $number)->min('number');

        $questionNow = $questions->where('number', $number)->first();
        $currentSubmission = $questionNow->teams()
                                ->where('team_id', Auth::user()->team->id)
                                ->first();
//        dd($currentSubmission);
        return view('peserta.mc.index', compact(
            'questions',
            'last_number',
            'previous',
            'next',
            'questionNow',
            'currentSubmission',
            'number',
            'contest'
        ));
    }

    public function store(Request $request)
    {
//        $this->authorizeAccess($contest);
        $questionNow = McQuestion::find($request->get('question_id'));

        $answer = $request->get('answer');

        $team = Auth::user()->team;
        $contest = $team->mcContest()->first();
//        $this->authorizeAccess($contest);
        if (isset($answer))
        {
            $right_answer = $questionNow->answer;

            // Get Score
            $score = (strtolower($answer) == strtolower($right_answer)) ? 1 : 0;

            // Save Submissions
            $questionNow->teams()->syncWithoutDetaching([
                $team->id => [
                    'answer' => $answer,
                    'score' => $score
                ]
            ]);
        }

        // Navigate to next question
        $number = $request->get('target');

//        dd($team->questions());
        $totalScore = $team->questions()->sum('score');
        $team->mcContest()->update([
            'total_score' => $totalScore
        ]);

        // Jika bukan Submit (last question), return langsung
        if ($number != 'end') return redirect(route('peserta.mc.index', ['number' => $number]));

        // Kalo end attempt, update waktu kumpul
        $team->mcContest()->update([
            'waktu_kumpul' => Carbon::now()
        ]);

        return redirect(route('peserta.index'))->with('success', "You have finished your attempt!");
    }
}
