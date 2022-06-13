<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sales_details')->insert([
            'id_sale' => '1',
            'id_product' => '1',
            'price' => '60.25',
            'subtotal' => '0.00',
            'state' => '1',            
            'created_at' => now(),
        ]);

        DB::table('sales_details')->insert([
            'id_sale' => '2',
            'id_product' => '2',
            'price' => '70.25',
            'subtotal' => '0.00',
            'state' => '1',            
            'created_at' => now(),
        ]);

        DB::table('sales_details')->insert([
            'id_sale' => '3',
            'id_product' => '3',
            'price' => '80.25',
            'subtotal' => '0.00',
            'state' => '1',            
            'created_at' => now(),
        ]);

        DB::table('sales_details')->insert([
            'id_sale' => '2',
            'id_product' => '2',
            'price' => '90.25',
            'subtotal' => '0.00',
            'state' => '1',            
            'created_at' => now(),
        ]);

        DB::table('sales_details')->insert([
            'id_sale' => '3',
            'id_product' => '3',
            'price' => '110.25',
            'subtotal' => '0.00',
            'state' => '1',            
            'created_at' => now(),
        ]);
    }
}
