<?php

namespace Database\Seeders;

use App\Constant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;

class TicketTableSeeder extends Seeder
{
    use WithFaker;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('ticket')->insert([
                'content' => $this->faker->text,
                'image' => 'image-' . rand(1,30),
                'user_id' => rand(3,17),
                'post_id' => rand(1,8),
                'type_id' => Constant::TICKET_REPORT,
                'created_at' => $this->faker->time('d-m-Y')
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            DB::table('ticket')->insert([
                'content' => $this->faker->text,
                'image' => 'image-' . rand(1,30),
                'user_id' => rand(3,17),
                'type_id' => Constant::TICKET_CONTACT,
                'created_at' => $this->faker->time('d-m-Y')
            ]);
        }
    }
}
