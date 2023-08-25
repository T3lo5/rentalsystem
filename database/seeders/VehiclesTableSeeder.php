<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle::create([
            'category_id' => 1,
            'name' => 'Carro 1',
            'description' => 'Descrição do carro 1',
            'price' => 100.00,
        ]);

        Vehicle::create([
            'category_id' => 2,
            'name' => 'Carro 2',
            'description' => 'Descrição do carro 2',
            'price' => 200.00,
        ]);

    }
}
