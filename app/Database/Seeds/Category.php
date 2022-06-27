<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Category extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        $data =  [
            [
                'id'  => 1,
                'name' =>  'Untitled',
                // 'slug' => 'untitled',
                'dsc' => "x s",
                //  'img' =>  $faker->imageUrl(640, 480, 'animals', true),
            ], [
                'id'  => 2,
                'name' =>  'Tas',
                // 'slug' => 'tas',
                'dsc' => "tasx",
                //'img' =>  $faker->imageUrl(640, 480, 'animals', true),
            ],
        ];
        $this->db->table('categories')->insertBatch($data);
    }
}
