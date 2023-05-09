<?php

namespace Database\Seeders;

use App\Constant;
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
        for ($i = 7; $i <= 17; $i++) {
            DB::table('user')->insert([
                'name' => $this->faker->name,
                'username' => $this->faker->name,
                'phone' => $this->faker->phoneNumber,
                'role_id' => Constant::ROLE_CANDIDATE,
                'email' => $this->faker->email,
                'password' => Hash::make('12345678'),
                'created_at' => $this->faker->time('d-m-Y')
            ]);

            DB::table('information')->insert([
                'content' => $this->faker->text,
                'user_id' => $i,
                'type_id' => $this->faker->phoneNumber,
            ]);
        }
    }
}
