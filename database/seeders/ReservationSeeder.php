<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // dd($this->faker;)
        for ($i=0; $i < 10; $i++) {
            Reservation::create([
                'patient_id' => rand(1,10),
                'date' => date("Y-m-d H:i:s", mktime(0, 0, rand(100,10000), date("m")  , date("d")+rand(1,10), date("Y"))),
            ]);
        }
    }
    }

