<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GasTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert gas types for Sri Lanka
        DB::table('gas_types')->insert([
            [
                'code' => 'GAS001',
                'name' => 'Domestic 12.5kg',
                'description' => 'Standard household cylinder for cooking purposes (12.5kg)',
                'category' => 'Domestic',
                'price' => 2750.00,
                'weight' => 12.5,
                'is_active' => true,
            ],
            [
                'code' => 'GAS002',
                'name' => 'Domestic 5kg',
                'description' => 'Small household cylinder for cooking or portable use (5kg)',
                'category' => 'Domestic',
                'price' => 1100.00,
                'weight' => 5.0,
                'is_active' => true,
            ],
            [
                'code' => 'GAS003',
                'name' => 'Commercial 37.5kg',
                'description' => 'Commercial grade cylinder for restaurants and small businesses (37.5kg)',
                'category' => 'Commercial',
                'price' => 7800.00,
                'weight' => 37.5,
                'is_active' => true,
            ],
            [
                'code' => 'GAS004',
                'name' => 'Industrial 45kg',
                'description' => 'Large cylinder for industrial applications (45kg)',
                'category' => 'Industrial',
                'price' => 9500.00,
                'weight' => 45.0,
                'is_active' => true,
            ],
        ]);
    }
}
