<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
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
                'name' => 'Colorless'
            ],
            [
                'name' => 'Darkness'
            ],
            [
                'name' => 'Dragon'
            ],
            [
                'name' => 'Fairy'
            ],
            [
                'name' => 'Fighting'
            ],
            [
                'name' => 'Fire'
            ],
            [
                'name' => 'Grass'
            ],
            [
                'name' => 'Lightning'
            ],
            [
                'name' => 'Metal'
            ],
            [
                'name' => 'Psychic'
            ],
            [
                'name' => 'Water'
            ],
        ];

        DB::table('types')->insert($data);
    }
}
