<?php

namespace App\Http\Controllers\MiniGame;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\Card;
use App\Models\History;
use App\Models\Letter;
use App\Models\Question;
use App\Models\Team;
use App\Models\TeamCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MiniGameController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        $histories = History::all()->pluck('question_id')->toArray();
//        $questionBoard1 = Board::with('questions')
//                            ->join('questions', 'boards.id', '=', 'questions.board_id')
//                            ->join('directions', 'questions.id', '=', 'directions.question_id')
//                            ->selectRaw("distinct questions.*, directions.direction")
//                            ->where('boards.board', '=', 1)
//                            ->whereNotIn('questions.id', $histories)
//                            ->get();
        $questionBoard1 = Question::where('board_id', 1)
                                ->whereNotIn('id', $histories)
                                ->get();

//        $letter1Temp = Board::with('letters')
//                    ->join('letters', 'boards.id', '=', 'letters.board_id')
//                    ->join('questions', 'boards.id', '=', 'questions.board_id')
//                    ->where('boards.board', '=', 1)
//                    ->select('letters.row', 'letters.col', 'letters.show', 'letters.letter', 'letters.head_number', 'letters.id')
//                    ->orderBy('row', 'ASC')
//                    ->orderBy('col', 'ASC')
//                    ->get();

        $letter1Temp = Letter::where('board_id', 1)
                    ->orderBy('row', 'ASC')
                    ->orderBy('col', 'ASC')
                    ->get();

        $letter1rowcol = Board::join('letters', 'boards.id', '=', 'letters.board_id')
                        ->where('boards.board', '=', 1)
                        ->selectRaw("max(letters.row) as row, max(letters.col) as col")
                        ->get()
                        ->toArray()[0];

        $board1MaxRow = $letter1rowcol['row'];
        $board1MaxCol = $letter1rowcol['col'];

        $letter1 = [];

        foreach ($letter1Temp as $l) {
            $numAndDir = [];
            $currLetter = Letter::with('questions')
                            ->join('directions', 'letters.id', '=', 'directions.letter_id')
                            ->join('questions', 'directions.question_id', '=', 'questions.id')
                            ->where('letters.id', $l->id)->get();

            foreach ($currLetter as $curr) {
                $numAndDir[] = (string)$curr->number;
            }

            $numAndDir = implode("|", $numAndDir);

            $letter1[$l->row][$l->col] = [
                'show' => $l->show,
                'letter' => $l->letter,
                'head_number' => $l->head_number,
                'direction' => $numAndDir
            ];
        }


//        $questionBoard2 = Board::with('questions')
//                            ->join('questions', 'boards.id', '=', 'questions.board_id')
//                            ->where('boards.board', '=', 2)
//                            ->get();

        $questionBoard2 = Question::where('board_id', 2)
                                ->whereNotIn('id', $histories)
                                ->get();

        $letter2Temp = Letter::where('board_id', 2)
                            ->orderBy('row', 'ASC')
                            ->orderBy('col', 'ASC')
                            ->get();

        $letter2rowcol = Board::join('letters', 'boards.id', '=', 'letters.board_id')
                            ->where('boards.board', '=', 2)
                            ->selectRaw("max(letters.row) as row, max(letters.col) as col")
                            ->get()
                            ->toArray()[0];

        $board2MaxRow = $letter2rowcol['row'];
        $board2MaxCol = $letter2rowcol['col'];

        $letter2 = [];

        foreach ($letter2Temp as $l) {
            $numAndDir = [];
            $currLetter = Letter::with('questions')
                            ->join('directions', 'letters.id', '=', 'directions.letter_id')
                            ->join('questions', 'directions.question_id', '=', 'questions.id')
                            ->where('letters.id', $l->id)->get();

            foreach ($currLetter as $curr) {
                $numAndDir[] = (string)$curr->number;
            }

            $numAndDir = implode("|", $numAndDir);

            $letter2[$l->row][$l->col] = [
                'show' => $l->show,
                'letter' => $l->letter,
                'head_number' => $l->head_number,
                'direction' => $numAndDir
            ];
        }

        return view('minigame.index', compact(
                'teams',
                'questionBoard1',
                'questionBoard2',
                'letter1',
                'letter2',
                'board1MaxRow',
                'board1MaxCol',
                'board2MaxRow',
                'board2MaxCol'
            )
        );
    }

    public function getActiveCell(Request $request) {
        $question = Question::find($request->get('question_id'));
        $quest = $question->question;

        $number = $question->number;

        $cells = $question->letters()->get();
        $rows = $cells->pluck('row');
        $cols = $cells->pluck('col');

        return response()->json(compact(
            'cells',
            'number',
            'rows',
            'cols',
            'quest'
        ), 200);
    }

    public function leftOver(Request $request)
    {
        $team = Team::find($request->get('team_id'));
        $leftover = 3 - $team->histories()->count();

        return response()->json(compact('leftover'), 200);
    }

    public function submit(Request $request) {
        DB::beginTransaction();
        try {
            $board = Board::where('board', $request->get('board'))->first();
            $team = Team::find($request->get('team_id'));
            $question = Question::find($request->get('question_id'));

            if ($team->histories()->count() >= 3) {
                return response()->json([
                    'status' => "failed",
                    'msg' => 'Tim hanya dapat menjawab soal dengan benar sebanyak maksimal 3 kali!'
                ], 200);
            }

            // Kalo udh terjawab
            if (!$question->history()->get()->isEmpty()) {
                return response()->json([
                    'status' => "failed",
                    'msg' => 'Soal sudah terjawab!'
                ], 200);
            }

            $answer = $question->answer;
            $teamAnswer = $request->get('answer');

            // Check Jawaban
            if (strtolower($answer) != strtolower($teamAnswer)) {
                return response()->json([
                    'status' => "failed",
                    'msg' => 'Jawaban Anda salah!'
                ], 200);
            }

            // Buat Pencatatan
            $hist = History::create([
                'team_id' => $team->id,
                'question_id' => $question->id
            ]);

            $letters = $question->letters()->get()->pluck('id')->toArray();
            $histories = History::all()->pluck('question_id')->toArray();

            // Ambil semua pertanyaan yg blm terjawab pada board tertentu
            $questionBoard = Question::where('board_id', $board->id)
                                ->whereNotIn('id', $histories)
                                ->orderBy('number', "ASC")
                                ->get();

            // Update Letter biar ke show
            Letter::whereIn('id', $letters)
                ->update([
                    'show' => '1'
                ]);

            // Ambil semua kartu yg udh diambil sama seluruh tim
            $unavailableCards = TeamCard::all()->pluck('card_id')
                                    ->toArray();

            // Check semua kartu yg masih bisa diambil
            $availableCards = Card::whereNotIn('id', $unavailableCards)->get();

            // Acak Kartunya (RANDOM)
            $availableCards = $availableCards->shuffle();
            $pickedCard = $availableCards[0];

            // Simpan kartu
//            $teamCard = TeamCard::create([
//                'card_id' => $pickedCard->id,
//                'team_id' => $team->id
//            ]);
            TeamCard::updateOrCreate(
                [
                    'team_id' => $team->id
                ],
                ['card_id' => $pickedCard->id]
            );

            // Leftover
            $leftover = 3 - $team->histories()->count();

            DB::commit();

            return response()->json([
                'status' => "success",
                'msg' => 'Jawaban Anda benar!',
                'questions' => $questionBoard,
                'board' => $board->board,
                'card' => $pickedCard,
                'leftover' => $leftover
            ], 200);
        } catch (\Exception $x) {
            DB::rollBack();
            return response()->json([
                'status' => "failed",
                'msg' => $x->getMessage()
            ], 200);
        }
    }
}
