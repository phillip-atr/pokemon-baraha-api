<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ClassesSeeder extends Seeder
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
                'name' => 'No Class'
            ],
            [
                'name' => 'PokéManiac'
            ],
            [
                'name' => 'Sailor'
            ],
            [
                'name' => 'Scientist'
            ],
            [
                'name' => 'Super Nerd'
            ],
            [
                'name' => 'Swimmer'
            ],
            [
                'name' => 'Tamer'
            ],
            [
                'name' => 'Youngster'
            ],
            [
                'name' => 'Champion'
            ],
            [
                'name' => 'Gym Leader'
            ],
            [
                'name' => 'Rival'
            ],
        ];

        DB::table('classes')->insert($data);
    }
}
