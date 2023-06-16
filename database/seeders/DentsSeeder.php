<?php

namespace Database\Seeders;

use App\Models\Dent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dents = ['18',
        '17',
        '16',
        '15',
        '14',
        '13',
        '12',
        '11',
        '21',
        '22',
        '23',
        '24',
        '25',
        '26',
        '27',
        '28',
        '48',
        '47',
        '46',
        '45',
        '44',
        '43',
        '42',
        '41',
        '31',
        '32',
        '33',
        '34',
        '35',
        '36',
        '37',
        '38',
    ];

    foreach($dents as $dent){
        // Dent::create([
        //     'id'=>$dent,
        //     'dent'=>$dent,
        // ]);
        DB::table('dents')->insert(
            array(
            'id' => $dent,
            'dent' => $dent
            )
            );
    }
    }
}
