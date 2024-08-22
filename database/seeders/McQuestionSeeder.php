<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class McQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($path, $model): void
    {
        include('csv-reader.php');
    }
}
