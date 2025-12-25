<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class EntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Load list php predefinita cu entriurile
        $entriesListings = include database_path('seeders/data/entries_listings.php');
        //Get user id-s from User model
        $userIds = User::pluck('id')->toArray(); //  deci rezulta un array

        // pe arrayul rezultat o sa folosim foreach ca sa iteram
        foreach ($entriesListings as &$listing) {
            //Assign user id to listing
            $listing['user_id'] = $userIds[array_rand($userIds)];
            //Add timestamp
            $listing['created_at'] = now();
            $listing['updated_at'] = now();
        }
        //Insert entry listings
        DB::table('all_entries')->insert($entriesListings);
        echo 'Entries created successfully!';
    }
}
