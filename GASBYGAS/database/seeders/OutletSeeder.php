<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert outlets for all provinces in Sri Lanka
        DB::table('outlets')->insert([
            // Western Province
            [
                'code' => 'COL001',
                'name' => 'Colombo Central',
                'address' => '123 Galle Road, Colombo 03',
                'contact_number' => '0112345678',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],
            [
                'code' => 'COL002',
                'name' => 'Nugegoda Branch',
                'address' => '45 High Level Road, Nugegoda',
                'contact_number' => '0112825678',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],
            [
                'code' => 'COL003',
                'name' => 'Mount Lavinia Branch',
                'address' => '78 Hotel Road, Mount Lavinia',
                'contact_number' => '0112735690',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],
            [
                'code' => 'NEG001',
                'name' => 'Negombo Main Branch',
                'address' => '200 Beach Road, Negombo',
                'contact_number' => '0312233445',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],
            [
                'code' => 'KAL001',
                'name' => 'Kalutara Branch',
                'address' => '35 Galle Road, Kalutara',
                'contact_number' => '0342266789',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],

            // Central Province
            [
                'code' => 'KAN001',
                'name' => 'Kandy City Center',
                'address' => '45 Dalada Veediya, Kandy',
                'contact_number' => '0812233445',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],
            [
                'code' => 'MAT001',
                'name' => 'Matale Branch',
                'address' => '23 Main Street, Matale',
                'contact_number' => '0662234567',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],
            [
                'code' => 'NUW001',
                'name' => 'Nuwara Eliya Center',
                'address' => '15 Grand Hotel Road, Nuwara Eliya',
                'contact_number' => '0522234567',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],

            // Southern Province
            [
                'code' => 'GAL001',
                'name' => 'Galle Fort Branch',
                'address' => '12 Church Street, Galle Fort',
                'contact_number' => '0912234567',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],
            [
                'code' => 'MAT002',
                'name' => 'Matara Main Branch',
                'address' => '5 Anagarika Dharmapala Mawatha, Matara',
                'contact_number' => '0412234567',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],
            [
                'code' => 'HAM001',
                'name' => 'Hambantota Branch',
                'address' => '45 Port Road, Hambantota',
                'contact_number' => '0472234567',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],

            // Northern Province
            [
                'code' => 'JAF001',
                'name' => 'Jaffna Central',
                'address' => '10 KKS Road, Jaffna',
                'contact_number' => '0212234567',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],
            [
                'code' => 'KIL001',
                'name' => 'Kilinochchi Branch',
                'address' => '22 A9 Road, Kilinochchi',
                'contact_number' => '0212256789',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],

            // Eastern Province
            [
                'code' => 'TRI001',
                'name' => 'Trincomalee Harbor Branch',
                'address' => '12 Harbor Road, Trincomalee',
                'contact_number' => '0262234567',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],
            [
                'code' => 'BAT001',
                'name' => 'Batticaloa Central',
                'address' => '33 Lagoon Road, Batticaloa',
                'contact_number' => '0652234567',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],
            [
                'code' => 'AMP001',
                'name' => 'Ampara Branch',
                'address' => '56 Main Street, Ampara',
                'contact_number' => '0632234567',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],

            // North Central Province
            [
                'code' => 'ANU001',
                'name' => 'Anuradhapura Sacred City',
                'address' => '34 Sacred City Road, Anuradhapura',
                'contact_number' => '0252234567',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],
            [
                'code' => 'POL001',
                'name' => 'Polonnaruwa Ancient City',
                'address' => '45 Ancient City Road, Polonnaruwa',
                'contact_number' => '0272234567',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],

            // North Western Province
            [
                'code' => 'KUR001',
                'name' => 'Kurunegala City',
                'address' => '21 Colombo Road, Kurunegala',
                'contact_number' => '0372234567',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],
            [
                'code' => 'PUT001',
                'name' => 'Puttalam Branch',
                'address' => '88 Colombo Road, Puttalam',
                'contact_number' => '0322234567',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],

            // Uva Province
            [
                'code' => 'BAD001',
                'name' => 'Badulla Central',
                'address' => '44 New Bazaar Road, Badulla',
                'contact_number' => '0552234567',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],
            [
                'code' => 'MON001',
                'name' => 'Monaragala Branch',
                'address' => '32 Main Street, Monaragala',
                'contact_number' => '0552278901',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],

            // Sabaragamuwa Province
            [
                'code' => 'RAT001',
                'name' => 'Ratnapura Gem City',
                'address' => '67 Main Street, Ratnapura',
                'contact_number' => '0452234567',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],
            [
                'code' => 'KEG001',
                'name' => 'Kegalle Branch',
                'address' => '23 Main Street, Kegalle',
                'contact_number' => '0352234567',
                'has_stock' => true,
                'is_accepting_orders' => true,
                'manager_user_id' => null,
            ],
        ]);
    }
}

