<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'name' => "Duokim garo",
            'start_date' => "2021-05-01",
            'end_date' => "2021-05-01",
            'place' => "Švyturio arena",
        ]);
        DB::table('events')->insert([
            'name' => "Paskutinis Sel koncertas",
            'start_date' => "2021-06-01",
            'end_date' => "2021-06-11",
            'place' => "Siemens arena",
        ]);
        DB::table('events')->insert([
            'name' => "Juros šventė",
            'start_date' => "2021-07-23",
            'end_date' => "2021-07-25",
            'place' => "Klaipėda",
        ]);
    }
}
