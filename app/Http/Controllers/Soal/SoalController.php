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
        return;
    }
}
