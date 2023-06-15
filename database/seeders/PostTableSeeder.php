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
                'title' => fake()->text,
                'requirements' => fake()->text,
                'description' => fake()->text,
                'benefit' => fake()->text,
                'quantity' => rand(3,5),
                'position' => 'Nhân viên',
                'workplace' => fake()->address,
                'experience' => '1 năm',
                'working' => Constant::FULL_TIME,
                'major' => Constant::MAJOR_IT,
                'status' => 1,
                'user_id' => rand(3,6),
                'approved_user_id' => rand(1,2),
                'approved_date' => Carbon::now()->subWeek(),
                'created_at' => Carbon::now()->subWeek()
            ]);

            DB::table('post')->insert([
                'title' => fake()->text,
                'requirements' => fake()->text,
                'description' => fake()->text,
                'benefit' => fake()->text,
                'quantity' => rand(3,5),
                'position' => 'Nhân viên',
                'workplace' => fake()->address,
                'experience' => '1 năm',
                'working' => Constant::PART_TIME,
                'major' => Constant::MAJOR_NEWSPAPERS,
                'status' => 1,
                'user_id' => rand(3,6),
                'approved_user_id' => rand(1,2),
                'approved_date' => Carbon::now()->subWeek(),
                'created_at' => Carbon::now()->subWeek()
            ]);

            DB::table('post')->insert([
                'title' => fake()->text,
                'requirements' => fake()->text,
                'description' => fake()->text,
                'benefit' => fake()->text,
                'quantity' => rand(3,5),
                'position' => 'Nhân viên',
                'workplace' => fake()->address,
                'experience' => '1 năm',
                'working' => Constant::PART_TIME,
                'major' => Constant::MAJOR_ELECTRONICS,
                'status' => 1,
                'user_id' => rand(3,6),
                'approved_user_id' => rand(1,2),
                'approved_date' => Carbon::now()->subWeek(),
                'created_at' => Carbon::now()->subWeek()
            ]);

            DB::table('post')->insert([
                'title' => fake()->text,
                'requirements' => fake()->text,
                'description' => fake()->text,
                'benefit' => fake()->text,
                'quantity' => rand(3,5),
                'position' => 'Nhân viên',
                'workplace' => fake()->address,
                'experience' => '1 năm',
                'working' => Constant::FULL_TIME,
                'major' => Constant::MAJOR_CAR_TECHNOLOGY,
                'status' => 1,
                'user_id' => rand(3,6),
                'approved_user_id' => rand(1,2),
                'approved_date' => Carbon::now()->subWeek(),
                'created_at' => Carbon::now()->subWeek()
            ]);

            DB::table('post')->insert([
                'title' => fake()->text,
                'requirements' => fake()->text,
                'description' => fake()->text,
                'benefit' => fake()->text,
                'quantity' => rand(3,5),
                'position' => 'Nhân viên',
                'workplace' => fake()->address,
                'experience' => '1 năm',
                'working' => Constant::FULL_TIME,
                'major' => Constant::MAJOR_MANUFACTURING,
                'status' => 1,
                'user_id' => rand(3,6),
                'approved_user_id' => rand(1,2),
                'approved_date' => Carbon::now()->subWeek(),
                'created_at' => Carbon::now()->subWeek()
            ]);

            DB::table('post')->insert([
                'title' => fake()->text,
                'requirements' => fake()->text,
                'description' => fake()->text,
                'benefit' => fake()->text,
                'quantity' => rand(3,5),
                'position' => 'Nhân viên',
                'workplace' => fake()->address,
                'experience' => '1 năm',
                'working' => Constant::FULL_TIME,
                'major' => Constant::MAJOR_MARKETING,
                'status' => 1,
                'user_id' => rand(3,6),
                'approved_user_id' => rand(1,2),
                'approved_date' => Carbon::now()->subWeek(),
                'created_at' => Carbon::now()->subWeek()
            ]);

            DB::table('post')->insert([
                'title' => fake()->text,
                'requirements' => fake()->text,
                'description' => fake()->text,
                'benefit' => fake()->text,
                'quantity' => rand(3,5),
                'position' => 'Nhân viên',
                'workplace' => fake()->address,
                'experience' => '1 năm',
                'working' => Constant::PART_TIME,
                'major' => Constant::MAJOR_ACCOUNTANT,
                'status' => 1,
                'user_id' => rand(3,6),
                'approved_user_id' => rand(1,2),
                'approved_date' => Carbon::now()->subWeek(),
                'created_at' => Carbon::now()->subWeek()
            ]);

            DB::table('post')->insert([
                'title' => fake()->text,
                'requirements' => fake()->text,
                'description' => fake()->text,
                'benefit' => fake()->text,
                'quantity' => rand(3,5),
                'position' => 'Nhân viên',
                'workplace' => fake()->address,
                'experience' => '1 năm',
                'working' => Constant::PART_TIME,
                'major' => Constant::MAJOR_REAL_ESTATE,
                'status' => 1,
                'user_id' => rand(3,6),
                'approved_user_id' => rand(1,2),
                'approved_date' => Carbon::now()->subWeek(),
                'created_at' => Carbon::now()->subWeek()
            ]);
        }
    }
}
