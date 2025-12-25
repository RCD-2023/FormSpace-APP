<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //mai intai golesc toate intrarile din baza de date
        // DB::table('users')->truncate();

        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('user_code')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn(
                [
                    'user_code',
                ]
            );
        });
    }
};
