<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'No Group'
            ],
            [
                'name' => 'Team Rocket'
            ],
            [
                'name' => 'Team Aqua'
            ],
            [
                'name' => 'Team Magma'
            ],
            [
                'name' => 'Team Galactic'
            ],
            [
                'name' => 'Team Plasma'
            ],
            [
                'name' => 'Team Flare'
            ],
            [
                'name' => 'Team Skull'
            ],
            [
                'name' => 'Team Instinct'
            ],
            [
                'name' => 'Team Valor'
            ],
            [
                'name' => 'Team Mystic'
            ],
        ];

        DB::table('groups')->insert($data);
    }
}
