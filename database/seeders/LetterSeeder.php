<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\Letter;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Boards
        $board1 = Board::where('board', 1)->first();
        $board2 = Board::where('board', 2)->first();

        $letterPoint1 = [
            1 => [
                'start' => [
                    'row' => 1,
                    'col' => 8
                ],
                'dir' => 'menurun'
            ],
            2 => [
                'start' => [
                    'row' => 6,
                    'col' => 4
                ],
                'dir' => 'menurun'
            ],
            3 => [
                'start' => [
                    'row' => 7,
                    'col' => 12
                ],
                'dir' => 'menurun'
            ],
            4 => [
                'start' => [
                    'row' => 8,
                    'col' => 3
                ],
                'dir' => 'mendatar'
            ],
            5 => [
                'start' => [
                    'row' => 8,
                    'col' => 6
                ],
                'dir' => 'menurun'
            ],
            6 => [
                'start' => [
                    'row' => 8,
                    'col' => 11
                ],
                'dir' => 'mendatar'
            ],
            7 => [
                'start' => [
                    'row' => 9,
                    'col' => 10
                ],
                'dir' => 'menurun'
            ],
            8 => [
                'start' => [
                    'row' => 11,
                    'col' => 3
                ],
                'dir' => 'mendatar'
            ],
            9 => [
                'start' => [
                    'row' => 13,
                    'col' => 3
                ],
                'dir' => 'menurun'
            ],
            10 => [
                'start' => [
                    'row' => 13,
                    'col' => 14
                ],
                'dir' => 'menurun'
            ],
            11 => [
                'start' => [
                    'row' => 14,
                    'col' => 1
                ],
                'dir' => 'mendatar'
            ],
            12 => [
                'start' => [
                    'row' => 16,
                    'col' => 1
                ],
                'dir' => 'mendatar'
            ],
            13 => [
                'start' => [
                    'row' => 16,
                    'col' => 5
                ],
                'dir' => 'menurun'
            ],
            14 => [
                'start' => [
                    'row' => 16,
                    'col' => 10
                ],
                'dir' => 'mendatar'
            ],
            15 => [
                'start' => [
                    'row' => 18,
                    'col' => 11
                ],
                'dir' => 'mendatar'
            ]
        ];

        $letterPoint2 = [
            1 => [
                'start' => [
                    'row' => 1,
                    'col' => 26
                ],
                'dir' => 'menurun'
            ],
            2 => [
                'start' => [
                    'row' => 2,
                    'col' => 8
                ],
                'dir' => 'mendatar'
            ],
            3 => [
                'start' => [
                    'row' => 2,
                    'col' => 10
                ],
                'dir' => 'menurun'
            ],
            4 => [
                'start' => [
                    'row' => 2,
                    'col' => 16
                ],
                'dir' => 'menurun'
            ],
            5 => [
                'start' => [
                    'row' => 4,
                    'col' => 4
                ],
                'dir' => 'menurun'
            ],
            6 => [
                'start' => [
                    'row' => 4,
                    'col' => 6
                ],
                'dir' => 'mendatar'
            ],
            7 => [
                'start' => [
                    'row' => 4,
                    'col' => 7
                ],
                'dir' => 'menurun'
            ],
            8 => [
                'start' => [
                    'row' => 4,
                    'col' => 15
                ],
                'dir' => 'mendatar'
            ],
            9 => [
                'start' => [
                    'row' => 4,
                    'col' => 20
                ],
                'dir' => 'menurun'
            ],
            10 => [
                'start' => [
                    'row' => 6,
                    'col' => 15
                ],
                'dir' => 'mendatar'
            ],
            11 => [
                'start' => [
                    'row' => 7,
                    'col' => 6
                ],
                'dir' => 'mendatar'
            ],
            12 => [
                'start' => [
                    'row' => 8,
                    'col' => 1
                ],
                'dir' => 'menurun'
            ],
            13 => [
                'start' => [
                    'row' => 10,
                    'col' => 1
                ],
                'dir' => 'mendatar'
            ],
            14 => [
                'start' => [
                    'row' => 10,
                    'col' => 3
                ],
                'dir' => 'menurun'
            ],
            15 => [
                'start' => [
                    'row' => 10,
                    'col' => 12
                ],
                'dir' => 'mendatar'
            ]
        ];

//        if ($board != null) {
//            foreach ($letterPoint1 as $num => $letter) {
//                $row = $letter['start']['row'];
//                $col = $letter['start']['col'];
//
//                $answer = Question::where('board_id', $board->id)->where('number', $num)->first('answer')['answer'];
//                $question = Question::where('board_id', $board->id)->where('number', $num)->first();
//                $answer = str_split($answer);
//                $first = true;
//                foreach ($answer as $l) {
//                    $temp = Letter::where('board_id', $board->id)
//                                    ->where('row', $row)
//                                    ->where('col', $col)
//                                    ->first();
//                    // Kalo blm ada
//                    if ($temp == null) {
//                        $temp = Letter::create([
//                            'board_id' => $board->id,
//                            'row' => $row,
//                            'col' => $col,
//                            'show' => 0,
//                            'letter' => $l,
//                            'head_number' => ($first) ? $num : null
//                        ]);
//
//                        if ($first) $first = false;
//                    } else {
//                        if ($first) {
//                            $temp->head_number = $num;
//                            $temp->save();
//                            $first = false;
//                        }
//                    }
//
//                    $temp->questions()->syncWithoutDetaching([
//                        $question->id => ['direction' => $letter['dir']]
//                    ]);
//
//                    if ($letter['dir'] == 'menurun') {
//                        $row++;
//                    } else {
//                        $col++;
//                    }
//                }
//            }
//        }
        $this->create($board1->id, $letterPoint1);
        $this->create($board2->id, $letterPoint2);
    }

    public function create($board_id, $letterPoint) {
        foreach ($letterPoint as $num => $letter) {
            $row = $letter['start']['row'];
            $col = $letter['start']['col'];

            $answer = Question::where('board_id', $board_id)->where('number', $num)->first('answer')['answer'];
            $question = Question::where('board_id', $board_id)->where('number', $num)->first();
            $answer = str_split($answer);
            $first = true;
            foreach ($answer as $l) {
                $temp = Letter::where('board_id', $board_id)
                    ->where('row', $row)
                    ->where('col', $col)
                    ->first();
                // Kalo blm ada
                if ($temp == null) {
                    $temp = Letter::create([
                        'board_id' => $board_id,
                        'row' => $row,
                        'col' => $col,
                        'show' => 0,
                        'letter' => $l,
                        'head_number' => ($first) ? $num : null
                    ]);

                    if ($first) $first = false;
                } else {
                    if ($first) {
                        $temp->head_number = $num;
                        $temp->save();
                        $first = false;
                    }
                }

                $temp->questions()->syncWithoutDetaching([
                    $question->id => ['direction' => $letter['dir']]
                ]);

                if ($letter['dir'] == 'menurun') {
                    $row++;
                } else {
                    $col++;
                }
            }
        }
    }
}
