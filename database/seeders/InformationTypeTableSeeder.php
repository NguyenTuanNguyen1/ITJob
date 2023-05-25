<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InformationTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Trình độ ngoại ngữ',
            'Chứng chỉ quốc tế',
            'Kĩ năng mềm',
            'Khác'
        ];
        foreach ($data as $content)
        {
            DB::table('information_type')->insert([
                'content' => $content
            ]);
        }

        // DB::table('information')->insert([
        //     'content' => fake()->text(),
        //     'user_id' => 1,
        //     'type_id' => rand(1,4),
        // ]);
    }
}
