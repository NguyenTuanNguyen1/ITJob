<?php

namespace Database\Seeders;

use App\Constant;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PostTableSeeder extends Seeder
{
    use WithFaker;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 3; $i++) {
            DB::table('post')->insert([
                'title' => fake()->title,
                'requirements' => fake()->text,
                'description' => fake()->text,
                'benefit' => fake()->text,
                'quantity' => rand(3,5),
                'position' => fake()->text,
                'workplace' => fake()->address,
                'experience' => '1 năm',
                'major' => 'IT/Công nghệ phần mềm',
                'status' => 1,
                'user_id' => 1,
                'created_at' => Carbon::now()->subWeek()
            ]);
        }

//        for ($i = 3; $i < 6; $i++) {
//            DB::table('post')->insert([
//                'title' => fake()->title,
//                'requirements' => fake()->text,
//                'description' => fake()->text,
//                'benefit' => fake()->text,
//                'quantity' => rand(3,5),
//                'position' => fake()->text,
//                'workplace' => fake()->address,
//                'level' => fake()->text,
//                'major' => 'HR',
//                'status' => 1,
//                'user_id' => rand(3,7),
//                'created_at' => Carbon::now()->subWeek()
//            ]);
//        }
    }
}
