<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        for ($i=1; $i <=5 ; $i++) { 
            # code...
            $mainUser = new User();
            $mainUser->email = "admin".$i."@dev.it";
            $mainUser->password = Hash::make('adminadmin');
            $mainUser->name = "admin".$i;
            $mainUser->surname = "admin";
            $mainUser->birth_date = "1994/07/19"; 
            $mainUser->save();
        }
        
    }
}
