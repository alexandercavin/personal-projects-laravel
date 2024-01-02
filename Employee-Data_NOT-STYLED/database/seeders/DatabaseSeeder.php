<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\Company::factory()->create([
        //     'first_name' => 'John',
        //     'last_name' => 'Doe',
        //     'gender' => 'M',
        //     'age'=> 23,
        //     'division'=> "Head Marketing",
        //     "job_experience"=> "",
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

        DB::table("companies")->insert([
            "first_name" => "John",
            "last_name" => "Doe",
            "gender" => "M",
            'age'=> 23,
            "division"=> "Head Marketing",
            "job_experience"=> "",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
    }
}
