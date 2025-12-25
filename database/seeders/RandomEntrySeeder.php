<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Entry;
use Database\Factories\EntryFactory;

class RandomEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //folosim EntryFactory existent pentru crearea de 10 random useri
        $entries = Entry::factory(10)->create();
        echo 'entries created successfully';
    }
}
