<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class RandomUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //folosim UserFactory existent pentru crearea de 5 random useri
        $users = User::factory(5)->create();
        echo 'Users created';
    }
}
