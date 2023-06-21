<?php

namespace Database\Seeders;

use App\Constant;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminTableSeeder extends Seeder
{
    use WithFaker;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            'name' => fake()->name(),
            'username' => 'job',
            'phone' => fake()->unique()->phoneNumber(),
            'address' => fake()->address(),
            'role_id' => Constant::ROLE_ADMIN,
            'major' => Constant::MAJOR_IT,
            'position' => 'Giám đốc',
            'email' => 'thinhminhlove@gmail.com',
            'description' => fake()->text,
            'password' => Hash::make('12345678'),
            'created_at' => Carbon::now()
        ]);

        DB::table('information')->insert([
            'content' => fake()->text,
            'user_id' => 1,
            'type_id' => rand(1,5),
        ]);
    }
}
