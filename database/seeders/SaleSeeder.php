<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sales')->insert([
            'client' => 'Miguel Angel Camachi',
            'nit' => '7788987987',
            'total' => '50.25',
            'decimal' => '5.25',
            'cambio' => '45.25',
            'state' => '1'            
        ]);
 
        DB::table('sales')->insert([
            'client' => 'Javier Apaza Machac',
            'nit' => '55555555555555',
            'total' => '50.25',
            'decimal' => '5.25',
            'cambio' => '45.25',
            'state' => '1'       
        ]);
 
        DB::table('sales')->insert([
            'client' => 'Evaristo Mendoza Machaca',
            'nit' => '444444444444',
            'total' => '50.25',
            'decimal' => '5.25',
            'cambio' => '45.25',
            'state' => '1'       
        ]);

        DB::table('sales')->insert([
            'client' => 'Carlos Quispe Aruquipa',
            'nit' => '3333333333333',
            'total' => '50.25',
            'decimal' => '5.25',
            'cambio' => '45.25',
            'state' => '1'       
        ]);

        DB::table('sales')->insert([
            'client' => 'Jaime Casas Apaza',
            'nit' => '2222222222222',
            'total' => '50.25',
            'decimal' => '5.25',
            'cambio' => '45.25',
            'state' => '1'       
        ]);
    }
}
