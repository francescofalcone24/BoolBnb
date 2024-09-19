<?php

namespace Database\Seeders;

use App\Models\Visual;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
class VisualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        
        for ($i=0; $i < 5; $i++) { 
            # code...
            $newVisual = new Visual();
            $newVisual->suite_id =  2;
            $newVisual->ip_address = $faker->localIpv4();
            $newVisual->date = '2024/01/30';
            $newVisual->save();
        }
        for ($i=0; $i < 8; $i++) { 
            # code...
            $newVisual = new Visual();
            $newVisual->suite_id =  2;
            $newVisual->ip_address = $faker->localIpv4();
            $newVisual->date = '2024/02/28';
            $newVisual->save();
        }
        for ($i=0; $i < 18; $i++) { 
            # code...
            $newVisual = new Visual();
            $newVisual->suite_id =  2;
            $newVisual->ip_address = $faker->localIpv4();
            $newVisual->date = '2024/03/30';
            $newVisual->save();
        }
        for ($i=0; $i < 28; $i++) { 
            # code...
            $newVisual = new Visual();
            $newVisual->suite_id =  2;
            $newVisual->ip_address = $faker->localIpv4();
            $newVisual->date = '2024/04/30';
            $newVisual->save();
        }
        for ($i=0; $i < 20; $i++) { 
            # code...
            $newVisual = new Visual();
            $newVisual->suite_id =  2;
            $newVisual->ip_address = $faker->localIpv4();
            $newVisual->date = '2024/05/30';
            $newVisual->save();
        }
        for ($i=0; $i < 1; $i++) { 
            # code...
            $newVisual = new Visual();
            $newVisual->suite_id =  2;
            $newVisual->ip_address = $faker->localIpv4();
            $newVisual->date = '2024/06/30';
            $newVisual->save();
        }
        for ($i=0; $i < 105; $i++) { 
            # code...
            $newVisual = new Visual();
            $newVisual->suite_id =  2;
            $newVisual->ip_address = $faker->localIpv4();
            $newVisual->date = '2024/07/30';
            $newVisual->save();
        }
        for ($i=0; $i < 2; $i++) { 
            # code...
            $newVisual = new Visual();
            $newVisual->suite_id =  2;
            $newVisual->ip_address = $faker->localIpv4();
            $newVisual->date = '2024/08/30';
            $newVisual->save();
        }
        for ($i=0; $i < 26; $i++) { 
            # code...
            $newVisual = new Visual();
            $newVisual->suite_id =  2;
            $newVisual->ip_address = $faker->localIpv4();
            $newVisual->date = '2024/09/30';
            $newVisual->save();
        }
    }
}
