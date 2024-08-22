<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\McChoice;
use App\Models\McQuestion;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(
            UserSeeder::class,
            false,
            ["path" => "database/data/1-user.csv", "model" => User::class]
        );
        $this->call([
            BoardSeeder::class,
            TeamSeeder::class,
            QuestionSeeder::class,
            LetterSeeder::class,
            CardSeeder::class,
        ]);

        $this->call(
            McQuestionSeeder::class,
            false,
            ["path" => "database/data/2-mc_questions.csv", "model" => McQuestion::class]
        );

        $this->call(
            McChoiceSeeder::class,
            false,
            ["path" => "database/data/3-mc_choices.csv", "model" => McChoice::class]
        );
    }
}
