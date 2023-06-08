<?php

namespace Database\Seeders;

use App\Constant;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ReviewTableSeeder extends Seeder
{
    use WithFaker;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('review')->insert([
                'content' => fake()->text,
                'from_user_id' => rand(3,10),
                'to_user_id' => rand(3,10),
                'created_at' => Carbon::now()->subWeek()
            ]);
        }
    }
}
