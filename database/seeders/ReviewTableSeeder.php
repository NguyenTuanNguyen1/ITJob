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
//        for ($i = 1; $i <= 5; $i++) {
//            DB::table('review')->insert([
//                'content' => $this->faker->text,
//                'image' => 'image-' . rand(1,30),
//                'from_user_id' => rand(3,17),
//                'to_user_id' => rand(3,17),
//                'created_at' => $this->faker->time('d-m-Y')
//            ]);
//        }

        DB::table('message')->insert([
            'message' => fake()->text,
            'from_user_id' => 1,
            'to_user_id' => 9,
            'created_at' => Carbon::now()
        ]);
    }
}
