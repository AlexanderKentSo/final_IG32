<?php

namespace App\Http\Controllers\Soal;

use App\Http\Controllers\Controller;
use App\Models\McChoice;
use App\Models\McQuestion;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    public function index()
    {
        $questions = McQuestion::all();
        return view('soal.index', compact('questions'));
    }

    public function create()
    {
        return view('soal.create');
    }

    public function store(Request $request)
    {
        if (
            $request->has('soal') &&
            $request->has('nomor') &&
            $request->has('jawaban_benar') &&
            $request->has('isi_a') &&
            $request->has('isi_b') &&
            $request->has('isi_c') &&
            $request->has('isi_d') &&
            $request->has('isi_e')
        ) {
            $soal = $request->get('soal');
            $nomor = (int)$request->get('nomor');
            $jawaban_benar = $request->get('jawaban_benar');

            // Bikin Soal
            $mcQuestion = McQuestion::create([
                'number' => $nomor,
                'question' => $soal,
                'answer' => $jawaban_benar
            ]);

            // Bikin Jawaban
            McChoice::create([
                'mc_question_id' => $mcQuestion->id,
                'alphabet' => 'A',
                'choice' => $request->get('isi_a')
            ]);

            McChoice::create([
                'mc_question_id' => $mcQuestion->id,
                'alphabet' => 'B',
                'choice' => $request->get('isi_b')
            ]);

            McChoice::create([
                'mc_question_id' => $mcQuestion->id,
                'alphabet' => 'C',
                'choice' => $request->get('isi_c')
            ]);

            McChoice::create([
                'mc_question_id' => $mcQuestion->id,
                'alphabet' => 'D',
                'choice' => $request->get('isi_d')
            ]);

            McChoice::create([
                'mc_question_id' => $mcQuestion->id,
                'alphabet' => 'E',
                'choice' => $request->get('isi_e')
            ]);
            return back()->with('success', "Berhasil membuat pertanyaan!");
        } else {
            return back()->with('failed', 'Masukkan data dengan benar!');
        }
    }

    public function edit(McQuestion $question)
    {
        $builder = $question->choices()->get();
        $a = $builder->where('alphabet', 'A')
            ->first()['choice'];
        $b = $builder->where('alphabet', 'B')
            ->first()['choice'];
        $c = $builder->where('alphabet', 'C')
            ->first()['choice'];
        $d = $builder->where('alphabet', 'D')
            ->first()['choice'];
        $e = $builder->where('alphabet', 'E')
            ->first()['choice'];

        return view('soal.edit', compact(
            'question',
            'a',
            'b',
            'c',
            'd',
            'e'
        ));
    }

    public function update(McQuestion $question, Request $request)
    {
        if (
            $request->has('soal') &&
            $request->has('nomor') &&
            $request->has('jawaban_benar') &&
            $request->has('isi_a') &&
            $request->has('isi_b') &&
            $request->has('isi_c') &&
            $request->has('isi_d') &&
            $request->has('isi_e')
        ) {
            $soal = $request->get('soal');
            $nomor = (int)$request->get('nomor');
            $jawaban_benar = $request->get('jawaban_benar');

            // Bikin Soal
            $question->number = $nomor;
            $question->question = $soal;
            $question->answer = $jawaban_benar;
            $question->save();
//            $mcQuestion = $question::update([
//                'number' => $nomor,
//                'question' => $soal,
//                'answer' => $jawaban_benar
//            ]);

            // Update Jawaban
            $choices = $question->choices()->orderBy('alphabet', 'ASC')->get();

            $choice_a = $choices[0];
            $choice_a->choice = $request['isi_a'];
            $choice_a->save();

            $choice_b = $choices[1];
            $choice_b->choice = $request['isi_b'];
            $choice_b->save();

            $choice_c = $choices[2];
            $choice_c->choice = $request['isi_c'];
            $choice_c->save();

            $choice_d = $choices[3];
            $choice_d->choice = $request['isi_d'];
            $choice_d->save();

            $choice_d = $choices[4];
            $choice_d->choice = $request['isi_e'];
            $choice_d->save();

            return back()->with('success', "Berhasil membuat pertanyaan!");
        } else {
            return back()->with('failed', 'Masukkan data dengan benar!');
        }
    }
}
