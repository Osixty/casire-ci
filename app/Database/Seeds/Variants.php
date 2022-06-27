<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Variants extends Seeder
{
    public function run()
    {
        $data =  [
            ['name'  => 'Warna'], ['name'  => 'Ukuran']
        ];
        $this->db->table('variants')->insertBatch($data);
        $data =  [
            [
                'value'             => 'Putih',
                'dsc'               => 'White',
                'hex'               => '#ffffff',
                'id_variant_option' => 1
            ], [
                'value'             => 'Putih',
                'dsc'               => 'White',
                'hex'               => '#ffffff',
                'id_variant_option' => 1
            ], [
                'value'             => 'Hitam',
                'dsc'               => 'Black',
                'hex'               => '#ffffff',
                'id_variant_option' => 1
            ], [
                'value'             => 'Biru',
                'dsc'               => 'Blue',
                'hex'               => '#1d6cbb',
                'id_variant_option' => 1
            ], [
                'value'             => 'Biru Muda',
                'dsc'               => 'Light Blue',
                'hex'               => '#8ad1e8',
                'id_variant_option' => 1
            ], [
                'value'             => 'Merah',
                'dsc'               => 'Red',
                'hex'               => '#ff0016',
                'id_variant_option' => 1
            ], [
                'value'             => 'Merah Muda',
                'dsc'               => 'Pink',
                'hex'               => '#ffb0b0',
                'id_variant_option' => 1
            ], [
                'value'             => 'Orange',
                'dsc'               => 'Orange',
                'hex'               => '#ffa500',
                'id_variant_option' => 1
            ], [
                'value'             => 'Kuning',
                'dsc'               => 'Yellow',
                'hex'               => '#ffff00',
                'id_variant_option' => 1
            ], [
                'value'             => 'Cokelat',
                'dsc'               => 'Brown',
                'hex'               => '#8b4513',
                'id_variant_option' => 1
            ], [
                'value'             => 'Hijau',
                'dsc'               => 'Green',
                'hex'               => '#006400',
                'id_variant_option' => 1
            ], [
                'value'             => 'Ungu',
                'dsc'               => 'Purple',
                'hex'               => '#bf00ff',
                'id_variant_option' => 1
            ], [
                'value'             => 'Abu-abu',
                'dsc'               => 'Grey',
                'hex'               => '#5d5d5d',
                'id_variant_option' => 1
            ]


        ];
        $this->db->table('variantoptions')->insertBatch($data);
    }
}
