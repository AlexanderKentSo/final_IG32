<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Board 1
        $board = Board::all()->first();
        $questions = [
            1 => [
                'question' => "Reaksi yang melepas elektron disebut reaksi?",
                "answer" => "oksidasi"
            ],
            2 => [
                'question' => "χ dibaca",
                'answer' => 'chi'
            ],
            3 => [
                'question' => "Daerah asal dalam matematika disebut?",
                'answer' => "domain"
            ],
            4 => [
                'question' => 'Mata Uang negara Malaysia adalah?',
                'answer' => "ringgit"
            ],
            5 => [
                'question' => 'Fotosintesis adalah proses tanaman hijau mengubah energi cahaya menjadi?',
                'answer' => "glukosa"
            ],
            6 => [
                'question' => "Lagu nasional Berkibarlah Benderaku diciptakan oleh?",
                'answer' => 'soed'
            ],
            7 => [
                'question' => 'Proses termodinamika yang terjadi pada tekanan konstan',
                'answer' => 'isobarik'
            ],
            8 => [
                'question' => 'Sel ... merupakan sel tunggal sederhana yang tidak memiliki nukleus sejati dan tidak memiliki membran pemisah dari sitoplasma.',
                'answer' => 'prokariotik'
            ],
            9 => [
                'question' => 'Bunyi pantul yang terdengar setelah bunyi asli selesai',
                'answer' => 'gema'
            ],
            10 => [
                'question' => 'Aturan Chargaff, dalam DNA jumlah guanin = jumlah ...',
                'answer' => 'sitosin'
            ],
            11 => [
                'question' => 'Pho merupakan makanan khas negara ...',
                'answer' => 'vietnam'
            ],
            12 => [
                'question' => 'Negara yang memenangkan piala dunia FIFA 2018',
                'answer' => 'prancis'
            ],
            13 => [
                'question' => 'Lensa yang bersifat divergen adalah lensa ...',
                'answer' => 'cekung'
            ],
            14 => [
                'question' => 'Unsur kimia dengan nomor atom 6',
                'answer' => 'karbon'
            ],
            15 => [
                'question' => 'Jenis plastik ... sering digunakan dalam proses pembuatan botol plastik, kantong plastik, dan jas hujan karena memiliki sifat fleksibel dan mudah dicetak.',
                'answer' => 'polietilen'
            ]
        ];

        foreach ($questions as $num => $question) {
            Question::create([
                'board_id' => $board->id,
                'number' => $num,
                'question' => $question['question'],
                'answer' => $question['answer']
            ]);
        }
    }
}
