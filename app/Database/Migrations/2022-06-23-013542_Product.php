<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'              => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'            => ['type' => 'varchar', 'constraint' => 255],
            // 'slug'            => ['type' => 'varchar', 'constraint' => 255],
            'dsc'             => ['type' => 'text'],
            // 'child_from'      => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            // 'img'             => ['type' => 'text'],
            'active'           => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 1],

            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        //  $this->forge->addKey('child_from');
        //  $this->forge->addForeignKey('child_from', 'categories', 'id');
        $this->forge->addUniqueKey('name');
        $this->forge->addUniqueKey('slug');
        $this->forge->createTable('categories', true);
        /* varaian tipe */
        $this->forge->addField([
            'id'              => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'            => ['type' => 'varchar', 'constraint' => 255],
            'active'           => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 1],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('variants', true);

        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'value'             => ['type' => 'varchar', 'constraint' => 255],
            'dsc'               => ['type' => 'varchar', 'constraint' => 255],
            'hex'               => ['type' => 'varchar', 'constraint' => 255],
            'id_variant_option' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'active'            => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 1],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_variant_option', 'variants', 'id');
        $this->forge->createTable('variantoptions', true);

        /*  products */
        $this->forge->addField([
            'id'              => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama'            => ['type' => 'varchar', 'constraint' => 255],
            'slug'             => ['type' => 'varchar', 'constraint' => 255],
            'dsc'             => ['type' => 'text'],
            'img'             => ['type' => 'text'],
            'active'           => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 1],

            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('slug');
        $this->forge->createTable('products', true);


        $this->forge->addField([
            'id'              => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'sku'             => ['type' => 'varchar', 'constraint' => 255],
            'dsc'             => ['type' => 'text'],
            'img'             => ['type' => 'text'],

            'harga_jual'       => ['type' => 'double',  'unsigned' => true, 'default' => 0],
            'harga_reseler'    => ['type' => 'double', 'unsigned' => true, 'default' => 0],
            'harga_cogs'       => ['type' => 'double',  'unsigned' => true, 'default' => 0],

            'stok'             => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'minstok'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'satuan'           => ['type' => 'varchar', 'constraint' => 255],
            'panjang'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'lebar'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'tinggi'           => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'berat'            => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'status'           => ['type' => 'int', 'constraint' => 11, 'null' => true],

            'terjual'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'active'           => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 1],
            'id_variantoptions'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],

            'id_primery'       => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_primery', 'products', 'id');
        $this->forge->addForeignKey('id_variantoptions', 'variantoptions', 'id');
        $this->forge->createTable('varianproducts', true);
    }

    public function down()
    {
        $this->forge->dropTable('categories', true);
        $this->forge->dropTable('variants', true);
        $this->forge->dropTable('variantoptions', true);
        $this->forge->dropTable('products', true);
        $this->forge->dropTable('varianproducts', true);
    }
}
