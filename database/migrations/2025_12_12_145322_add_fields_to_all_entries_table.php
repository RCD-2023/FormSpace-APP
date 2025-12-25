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
        //First clear table all_entries data (all data will be cleared)
        DB::table('all_entries')->truncate();
        //
        Schema::table('all_entries', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');
            $table->string('local_id', 6)->unique();
            $table->string('v_email');
            $table->string('v_website')->nullable();
            $table->string('v_country');
            $table->string('v_city');
            $table->string('v_address')->nullable();
            $table->enum('organisation_type', [
                'corporation',
                'proprietorship',
                'partnership'
            ])->default('corporation');
            $table->unsignedInteger('employee_num');
            $table->json('business_type')->nullable();
            //Foreign key (FK) constrain for user
            $table->foreign('user_id')->references('id')->on('users');
        }); //nu folosesc aici onDelete('cascade') pentru stergerea unui user.Prefer sa blochez stergerea lui ca altfel daca-l sterg se vor sterge si toate datele introduse de el.
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('all_entries', function (Blueprint $table) {
            // Drop foreign key constraint and ONLY after that we can drop 'user_id' column
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id']);
            //Drop de rest of column data (which do not have constraints or foreign key on them)
            $table->dropColumn([
                'local_id',
                'vendor_name',
                'vendor_desc',
                'v_email',
                'v_website',
                'v_country',
                'v_city',
                'v_address',
                'organisation_type',
                'employee_num',
                'business_type',
            ]);
        });
    }
};
