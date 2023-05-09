<?php

namespace Database\Seeders;

use App\Constant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CompanyTableSeeder extends Seeder
{
    use WithFaker;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 3; $i <= 7; $i++) {
            DB::table('user')->insert([
                'name' => $this->faker->name,
                'username' => $this->faker->name,
                'phone' => $this->faker->phoneNumber,
                'email' => $this->faker->email,
                'img_avatar' => 'avatar.jpg',
                'password' => Hash::make('12345678'),
                'role_id' => Constant::ROLE_COMPANY,
            ]);

            DB::table('information')->insert([
                'content' => $this->faker->text,
                'user_id' => $i,
                'type_id' => $this->faker->phoneNumber,
            ]);

            DB::table('company_information')->insert([
                'type' => $this->faker->title,
                'staff' => rand(1,100),
                'headquarters' => $this->faker->title,
                'taxcode' => 'ABWINC20',
                'description' => $this->faker->text,
                'website' => 'https://www.facebook.com/',
                'user_id' => $i,
                'created_at' => $this->faker->time('d-m-Y')
            ]);
        }
    }
}
