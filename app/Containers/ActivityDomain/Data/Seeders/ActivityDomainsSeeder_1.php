<?php

namespace App\Containers\ActivityDomain\Data\Seeders;

use App\Ship\Parents\Seeders\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityDomainsSeeder_1 extends Seeder
{
    public function run(): void
    {
        $activity_domains = array(
            ["name" => "فناوری اطلاعات"],
            ["name" => "حقوقی"],
            ["name" => "مالی"],
            ["name" => "خدماتی"],
            ["name" => "راه و ترابری"],
        );
        DB::table('activity_domains')->insert($activity_domains);
    }
}
