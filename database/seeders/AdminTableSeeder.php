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
        $user = new User();
        DB::table('user')->insert([
            'name' => fake()->name(),
            'username' => 'job',
            'phone' => fake()->unique()->phoneNumber(),
            'address' => fake()->address(),
            'role_id' => Constant::ROLE_ADMIN,
            'major' => Constant::MAJOR_IT,
            'position' => 'Giám đốc',
            'email' => 'thinh.tranlequang@.com',
            'password' => Hash::make('12345678'),
            'created_at' => Carbon::now()
        ]);

        DB::table('user')->insert([
            'name' => fake()->name(),
            'username' => 'job2',
            'phone' => fake()->unique()->phoneNumber(),
            'address' => fake()->address(),
            'major' => Constant::MAJOR_IT,
            'position' => 'Giám đốc',
            'role_id' => Constant::ROLE_ADMIN,
            'email' => 'thinh.tranlequang@ncc.asia',
            'password' => Hash::make('12345678'),
            'created_at' => Carbon::now()
        ]);

        DB::table('information')->insert([
            'content' => fake()->text,
            'user_id' => 1,
            'type_id' => rand(1,5),
        ]);
        DB::table('information')->insert([
            'content' => fake()->text,
            'user_id' => 2,
            'type_id' => rand(1,5),
        ]);
    }
}
