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
//        $board = Board::all()->first();
        $board1 = Board::where('board', 1)->first();
        $board2 = Board::where('board', 2)->first();
        $questions1 = [
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

        $questions2 = [
            1 => [
                'question' => 'Bunyi pantul yang terdengar sebelum bunyi asli selesai',
                'answer' => 'gaung'
            ],
            2 => [
                'question' => 'Sel ... merupakan sel yang memiliki nukleus sejati dan memiliki membran pemisa',
                'answer' => 'eukariotik'
            ],
            3 => [
                'question' => 'Mata uang negara Myanmar adalah ...',
                'answer' => 'kyat'
            ],
            4 => [
                'question' => 'Proses termodinamika yang terjadi pada suhu konstan',
                'answer' => 'isotermal'
            ],
            5 => [
                'question' => 'Reaksi yang menangkap elektron disebut reaksi ...',
                'answer' => 'reduksi'
            ],
            6 => [
                'question' => 'Negara yang memenangkan piala dunia FIFA 2014',
                'answer' => 'jerman'
            ],
            7 => [
                'question' => '𝜀 dibaca ... ',
                'answer' => 'epsilon'
            ],
            8 => [
                'question' => 'Jenis plastik ... sering digunakan dalam pembuatan tempat penyimpanan makanan dan botol bayi karena tidak mudah bereaksi dengan bahan makanan dan minuman.',
                'answer' => 'polipropilen'
            ],
            9 => [
                'question' => 'Daerah hasil dalam matematika disebut',
                'answer' => 'range'
            ],
            10 => [
                'question' => 'Lensa yang bersifat konvergen adalah lensa ...',
                'answer' => 'cembung'
            ],
            11 => [
                'question' => 'Aturan Chargaff, dalam DNA jumlah adenin = jumlah ...',
                'answer' => 'timin'
            ],
            12 => [
                'question' => 'Pori-pori kecil yang terletak pada permukaan daun dan batang tanaman dan berfungsi sebagai tempat pertukaran gas disebut ...',
                'answer' => 'stomata'
            ],
            13 => [
                'question' => 'Unsur kimia dengan nomor atom 8',
                'answer' => 'oksigen'
            ],
            14 => [
                'question' => 'Lagu nasional Bendera Merah Putih diciptakan oleh ...',
                'answer' => 'soed'
            ],
            15 => [
                'question' => 'Pad Thai merupakan makanan khas negara ...',
                'answer' => 'thailand'
            ]
        ];

//        foreach ($questions as $num => $question) {
//            Question::create([
//                'board_id' => $board->id,
//                'number' => $num,
//                'question' => $question['question'],
//                'answer' => $question['answer']
//            ]);
//        }
        $this->create($board1->id, $questions1);
        $this->create($board2->id, $questions2);
    }

    public function create($board_id, $questions)
    {
        foreach ($questions as $num => $question) {
            Question::create([
                'board_id' => $board_id,
                'number' => $num,
                'question' => $question['question'],
                'answer' => $question['answer']
            ]);
        }
    }
}
