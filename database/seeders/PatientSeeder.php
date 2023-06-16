<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i=0; $i < 10; $i++) {
            Patient::create([
                'fname' => fake()->firstName(),
                'name' => fake()->lastName(),
                'cin' => 'MC'. fake()->randomNumber(6),
                'gender' => 'm',
                'iswaiting'=>fake()->boolean(),
                'birth_date'=>fake()->date(),
                'phone' => fake()->numerify('06########'),
                'assurance_id' => 1,
            ]);
        }
    }
}
