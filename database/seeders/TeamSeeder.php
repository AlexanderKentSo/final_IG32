<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = User::where('role', 'peserta')->get();

        foreach ($teams as $team) {
            $name = explode('_', $team->username);
            $name = implode(" ", $name);
            Team::create([
                'user_id' => $team->id,
                'name' => ucfirst($name)
            ]);
        }
    }
}
