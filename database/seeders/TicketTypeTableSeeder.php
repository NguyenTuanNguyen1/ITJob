<?php

namespace Database\Seeders;

use App\Constant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;

class TicketTypeTableSeeder extends Seeder
{
    use WithFaker;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 2; $i++) {
            switch ($i)
            {
                case Constant::TICKET_REPORT:
                    DB::table('ticket_type')->insert([
                        'content' => 'report',
                    ]);
                    break;
                case Constant::TICKET_CONTACT:
                    DB::table('ticket_type')->insert([
                        'content' => 'contact',
                    ]);
                    break;
            }
        }
    }
}