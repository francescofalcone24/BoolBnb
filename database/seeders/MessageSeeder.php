<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newMessage = new Message();
        $newMessage->email = 'ciao@ciao.it';
        $newMessage->text = "Testo molto molto molto molto molto molto molto molto molto lungo";
        $newMessage->date = "2024/07/19";
        $newMessage->suite_id = 1;
        $newMessage->save();
    }
}
