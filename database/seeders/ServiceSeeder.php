<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        
        $newWi_fi = new Service();
        $newWi_fi->name = "Wi-fi";
        $newWi_fi->icon = "fa-solid fa-wifi";
        $newWi_fi->description = "This is service 1";
        $newWi_fi->save(); 

        $newCarParking = new Service();
        $newCarParking->name = "Car-Parking";
        $newCarParking->icon = "fa-solid fa-square-parking";
        $newCarParking->description = "This is service 1";
        $newCarParking->save();  

        $newPool = new Service();
        $newPool->name = "Pool";
        $newPool->icon = "fa-solid fa-person-swimming";
        $newPool->description = "This is service 1";
        $newPool->save(); 

        $newConcierge = new Service();
        $newConcierge->name = "Concierge";
        $newConcierge->icon = "fa-solid fa-bell-concierge";
        $newConcierge->description = "This is service 1";
        $newConcierge->save();  

        $newSauna = new Service();
        $newSauna->name = "Sauna";
        $newSauna->icon = "fa-solid fa-hot-tub-person";
        $newSauna->description = "This is service 1";
        $newSauna->save();  

        $newSea_view = new Service();
        $newSea_view->name = "Sea-view";
        $newSea_view->icon = "fa-solid fa-water";
        $newSea_view->description = "This is service 1";
        $newSea_view->save();
    }
}
