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
        for ($i = 1; $i <= 30; $i++) {
            DB::table('ticket')->insert([
                'content' => fake()->text,
                'from_user_id' => rand(2,21),
                'to_user_id' => rand(2,21),
                'type_id' => Constant::TICKET_REPORT_USER,
                'created_at' => Carbon::now()->subWeek()
            ]);
        }

        for ($i = 1; $i <= 30; $i++) {
            DB::table('ticket')->insert([
                'content' => fake()->text,
                'from_user_id' => rand(2,21),
                'post_id' => rand(1,16),
                'type_id' => Constant::TICKET_REPORT_POST,
                'created_at' => Carbon::now()->subWeek()
            ]);
        }

        for ($i = 1; $i <= 30; $i++) {
            DB::table('ticket')->insert([
                'username' => fake()->name,
                'content' => fake()->text,
                'email' => fake()->email,
                'from_user_id' => rand(2,21),
                'type_id' => Constant::TICKET_CONTACT,
                'created_at' => Carbon::now()->subWeek()
            ]);
        }

        for ($i = 1; $i <= 30; $i++) {
            DB::table('ticket')->insert([
                'content' => fake()->text,
                'from_user_id' => rand(2,21),
                'to_user_id' => rand(2,21),
                'type_id' => Constant::TICKET_REVIEW,
                'created_at' => Carbon::now()->subWeek()
            ]);
        }

        for ($i = 1; $i <= 150; $i++) {
            DB::table('images')->insert([
                'image' => 'image-' . rand(1,20) . '.jpg',
                'ticket_id' => rand(1,60),
                'created_at' => Carbon::now()->subWeek()
            ]);
        }
    }
}
