<?php

namespace Database\Seeders;

use App\Constant;
use Carbon\Carbon;
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
        for ($i = 1; $i <= 20; $i++) {
            DB::table('ticket')->insert([
                'username' => fake()->name,
                'subject' => fake()->text,
                'content' => fake()->text,
                'email' => fake()->email,
                'user_id' => rand(1,10),
                'post_id' => rand(1,16),
                'type_id' => Constant::TICKET_REPORT,
                'created_at' => Carbon::now()->subWeek()
            ]);
        }

        for ($i = 1; $i <= 20; $i++) {
            DB::table('ticket')->insert([
                'username' => fake()->name,
                'subject' => fake()->text,
                'content' => fake()->text,
                'email' => fake()->email,
                'user_id' => rand(1,10),
                'type_id' => Constant::TICKET_CONTACT,
                'created_at' => Carbon::now()->subWeek()
            ]);
        }
    }
}
