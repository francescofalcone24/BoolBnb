<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sponsor;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bronzeSponsorhip = new Sponsor();
        $bronzeSponsorhip->name = "Bronze";
        $bronzeSponsorhip->period = "24:00:00";
        $bronzeSponsorhip->price = 2.99;
        $bronzeSponsorhip->save();

        $silverSponsorhip = new Sponsor();
        $silverSponsorhip->name = "Silver";
        $silverSponsorhip->period = "72:00:00";
        $silverSponsorhip->price = 5.99;
        $silverSponsorhip->save();

        $goldSponsorhip = new Sponsor();
        $goldSponsorhip->name = "Gold";
        $goldSponsorhip->period = "144:00:00";
        $goldSponsorhip->price = 9.99;
        $goldSponsorhip->save();
    }
}
