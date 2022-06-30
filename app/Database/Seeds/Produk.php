<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Produk extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id');
        $id = 0;
        $a = 1;
        for ($i = 0; $i < 1000; $i++) {
            $id++;
            $nama=$faker->sentence(3);
            $data = [
                'id' => $id,
                'name'            => $nama,
                'slug'             => $this->slugify($nama),
                'dsc'             => $faker->paragraph(),
                'img'             => $faker->imageUrl(640, 480, 'animals', true),
                'id_categories' =>  $faker->numberBetween(1, 2)
            ];
            $this->db->table('products')->insert($data);
         
            for ($j = 1; $j < 5; $j++) {
                $a++;
                $data = [
                    'sku'             =>  $faker->regexify('[A-Z]{5}[0-4]{3}'),
                    'img'             =>  $faker->imageUrl(640, 480, 'animals', true),
                    'dsc'             => $faker->paragraph(),
                    'harga_jual'       => $faker->numberBetween(20000, 200000),
                    'harga_reseler'    =>  $faker->numberBetween(20000, 200000),
                    'harga_cogs'       =>  $faker->numberBetween(20000, 200000),
                    'stok'             => $faker->randomNumber(5, false),
                    'minstok'             => $faker->randomNumber(5, false),
                    'satuan'            => $faker->randomDigitNotNull(),
                    'panjang'             => $faker->randomDigitNotNull(),
                    'lebar'             => $faker->randomDigitNotNull(),
                    'tinggi'             => $faker->randomDigitNotNull(),
                    'berat'            => $faker->randomDigitNotNull(),
                    'status'            => $faker->randomDigitNotNull(),
                    'terjual'  => $faker->numberBetween(0, 20000),
                    'id_variantoptions' => $j,
                    'id_primery'       => $id,
                ];

                $this->db->table('varianproducts')->insert($data);
            }
        }
    }
    private function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }
}
