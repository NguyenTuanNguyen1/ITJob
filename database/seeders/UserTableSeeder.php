<?php

namespace Database\Seeders;

use App\Constant;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    use WithFaker;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 7; $i <= 7; $i++) {
            DB::table('user')->insert([
                'name' => fake()->name,
                'username' => fake()->firstName,
                'phone' => fake()->phoneNumber,
                'role_id' => Constant::ROLE_CANDIDATE,
                'major' => Constant::MAJOR_MANUFACTURING,
                'position' => 'Nhân viên',
                'description' => fake()->text,
                'email' => 'kensu8434@gmail.com',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now()
            ]);
        }

        for ($i = 8; $i <= 8; $i++) {
            DB::table('user')->insert([
                'name' => fake()->name,
                'username' => fake()->firstName,
                'phone' => fake()->phoneNumber,
                'role_id' => Constant::ROLE_CANDIDATE,
                'major' => Constant::MAJOR_MANUFACTURING,
                'position' => 'Nhân viên',
                'description' => fake()->text,
                'email' => '0306201384@caothang.edu,vn',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now()
            ]);
        }

        for ($i = 9; $i <= 10; $i++) {
            DB::table('user')->insert([
                'name' => fake()->name,
                'username' => fake()->firstName,
                'phone' => fake()->phoneNumber,
                'role_id' => Constant::ROLE_CANDIDATE,
                'major' => Constant::MAJOR_IT,
                'position' => 'Nhân viên',
                'description' => fake()->text,
                'email' => fake()->email,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now()
            ]);
        }

        for ($i = 11; $i <= 12; $i++) {
            DB::table('user')->insert([
                'name' => fake()->name,
                'username' => fake()->firstName,
                'phone' => fake()->phoneNumber,
                'role_id' => Constant::ROLE_CANDIDATE,
                'major' => Constant::MAJOR_MARKETING,
                'position' => 'Nhân viên',
                'description' => fake()->text,
                'email' => fake()->email,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now()
            ]);
        }

        for ($i = 13; $i <= 14; $i++) {
            DB::table('user')->insert([
                'name' => fake()->name,
                'username' => fake()->firstName,
                'phone' => fake()->phoneNumber,
                'role_id' => Constant::ROLE_CANDIDATE,
                'major' => Constant::MAJOR_ACCOUNTANT,
                'position' => 'Nhân viên',
                'description' => fake()->text,
                'email' => fake()->email,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now()
            ]);
        }

        for ($i = 15; $i <= 16; $i++) {
            DB::table('user')->insert([
                'name' => fake()->name,
                'username' => fake()->firstName,
                'phone' => fake()->phoneNumber,
                'role_id' => Constant::ROLE_CANDIDATE,
                'major' => Constant::MAJOR_ELECTRONICS,
                'position' => 'Nhân viên',
                'description' => fake()->text,
                'email' => fake()->email,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now()
            ]);
        }
        for ($i = 17; $i <= 18; $i++) {
            DB::table('user')->insert([
                'name' => fake()->name,
                'username' => fake()->firstName,
                'phone' => fake()->phoneNumber,
                'role_id' => Constant::ROLE_CANDIDATE,
                'major' => Constant::MAJOR_REAL_ESTATE,
                'position' => 'Nhân viên',
                'description' => fake()->text,
                'email' => fake()->email,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now()
            ]);
        }

        for ($i = 19; $i <= 20; $i++) {
            DB::table('user')->insert([
                'name' => fake()->name,
                'username' => fake()->firstName,
                'phone' => fake()->phoneNumber,
                'role_id' => Constant::ROLE_CANDIDATE,
                'major' => Constant::MAJOR_CAR_TECHNOLOGY,
                'position' => 'Nhân viên',
                'description' => fake()->text,
                'email' => fake()->email,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now()
            ]);
        }

        for ($i = 21; $i <= 22; $i++) {
            DB::table('user')->insert([
                'name' => fake()->name,
                'username' => fake()->firstName,
                'phone' => fake()->phoneNumber,
                'role_id' => Constant::ROLE_CANDIDATE,
                'major' => Constant::MAJOR_NEWSPAPERS,
                'position' => 'Nhân viên',
                'description' => fake()->text,
                'email' => fake()->email,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now()
            ]);
        }

        DB::table('information')->insert([
            'content' => fake()->text,
            'user_id' => rand(7,22),
            'type_id' => rand(1, 4),
        ]);
    }
}
