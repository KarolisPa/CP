<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizers')->insert([
            'event_id' => 1,
            'name' => "Renginių vizija"
        ]);
        DB::table('organizers')->insert([
            'event_id' => 2,
            'name' => "Trys Karaliai"
        ]);
        DB::table('organizers')->insert([
            'event_id' => 3,
            'name' => "Eventum Group"
        ]);
        DB::table('organizers')->insert([
            'event_id' => null,
            'name' => "Renginių kalvė"
        ]);
    }
}
