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
        for ($i = 1; $i < 8; $i++) {
            DB::table('post')->insert([
                'title' => $this->faker->title,
                'requirements' => $this->faker->text,
                'description' => $this->faker->text,
                'benefit' => $this->faker->text,
                'quantity' => $this->faker->text,
                'position' => $this->faker->name,
                'workplace' => $this->faker->address(),
                'level' => $this->faker->text,
                'major' => $this->faker->name,
                'status' => 1,
                'user_id' => rand(3,5),
                'created_at' => $this->faker->time('d-m-Y')
            ]);
        }
    }
}
