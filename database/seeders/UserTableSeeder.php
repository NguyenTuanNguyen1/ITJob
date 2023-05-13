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
        for ($i = 1; $i <= 5; $i++) {
            DB::table('user')->insert([
                'name' => fake()->name,
                'username' => fake()->name,
                'phone' => fake()->phoneNumber,
                'role_id' => Constant::ROLE_CANDIDATE,
                'email' =>fake()->email,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now()
            ]);

//            DB::table('information')->insert([
//                'content' => $this->faker->text,
//                'user_id' => $i+1,
//                'type_id' => $this->faker->phoneNumber,
//            ]);
        }
    }
}
