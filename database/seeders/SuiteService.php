<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class SuiteService extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 1; $i <= 64; $i++) {
            $sql = 'insert into suite_service ( suite_id , service_id  ) values (?, ?)';
            $project = $i;

            if ($i % 1 == 0) {
                $tech = 1;

                DB::insert($sql, [
                    $project,
                    $tech,
                ]);
            }
        };
        for ($i = 1; $i <= 64; $i++) {
            $sql = 'insert into suite_service ( suite_id , service_id  ) values (?, ?)';
            $project = $i;

            if ($i % 1 == 0 && $i % 7 == 0) {
                $tech = 5;

                DB::insert($sql, [
                    $project,
                    $tech,
                ]);
            }
        };

        for ($i = 1; $i <= 64; $i++) {
            $sql = 'insert into suite_service ( suite_id , service_id  ) values (?, ?)';
            $project = $i;

            if ($i % 2 == 0) {
                $tech = 2;

                DB::insert($sql, [
                    $project,
                    $tech,
                ]);
            };
        }
        for ($i = 1; $i <= 64; $i++) {
            $sql = 'insert into suite_service ( suite_id , service_id  ) values (?, ?)';
            $project = $i;

            if ($i % 3 == 0) {
                $tech = 3;
                DB::insert($sql, [
                    $project,
                    $tech,
                ]);
            }
        };

        for ($i = 1; $i <= 64; $i++) {
            $sql = 'insert into suite_service ( suite_id , service_id  ) values (?, ?)';
            $project = $i;

            if ($i % 5 == 0) {
                $tech = 5;
                DB::insert($sql, [
                    $project,
                    $tech,
                ]);
            }
        };

        for ($i = 1; $i <= 64; $i++) {
            $sql = 'insert into suite_service ( suite_id , service_id  ) values (?, ?)';
            $project = $i;

            if ($i % 4 == 0) {
                $tech = 4;

                DB::insert($sql, [
                    $project,
                    $tech,
                ]);
            }
        };

        for ($i = 1; $i <= 64; $i++) {
            $sql = 'insert into suite_service ( suite_id , service_id  ) values (?, ?)';
            $project = $i;

            if ($i % 6 == 0) {
                $tech = 6;

                DB::insert($sql, [
                    $project,
                    $tech,
                ]);
            }
        };
    }
}
