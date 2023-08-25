<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Vehicle;

class ReservationsTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::find(1); // ID do usuário
        $vehicle = Vehicle::find(1); // ID do veículo

        Reservation::create([
            'user_id' => $user->id,
            'vehicle_id' => $vehicle->id,
        ]);
    }
}
