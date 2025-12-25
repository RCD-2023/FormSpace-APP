<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Entry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //First should disable FK
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        //Truncate tables
        DB::table('all_entries')->truncate();
        DB::table('users')->truncate();
        //Re-enable FK
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->call(RandomUserSeeder::class);
        $this->call(EntrySeeder::class);
    }
}







// iniatial am folosit acest cod inside run()
  // User::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);