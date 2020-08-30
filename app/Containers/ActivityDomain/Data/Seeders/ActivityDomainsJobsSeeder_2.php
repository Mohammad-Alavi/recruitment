<?php

namespace App\Containers\ActivityDomain\Data\Seeders;

use App\Ship\Parents\Seeders\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityDomainsJobsSeeder_2 extends Seeder
{
    public function run(): void
    {
        $activity_domain_jobs = array(
            [
                "name" => "نرم افزار",
                "activity_domain_id" => 1
            ],
            [
                "name" => "شبکه",
                "activity_domain_id" => 1
            ],
            [
                "name" => "سخت افزار",
                "activity_domain_id" => 1
            ],
            [
                "name" => "وکیل",
                "activity_domain_id" => 2
            ],
            [
                "name" => "ناظر",
                "activity_domain_id" => 2
            ],
            [
                "name" => "نماینده",
                "activity_domain_id" => 2
            ],
            [
                "name" => "حساب دار",
                "activity_domain_id" => 3
            ],
            [
                "name" => "ممیزی",
                "activity_domain_id" => 3
            ],
            [
                "name" => "مستخدم",
                "activity_domain_id" => 4
            ],
            [
                "name" => "آبدارچی",
                "activity_domain_id" => 4
            ],
            [
                "name" => "باغبان",
                "activity_domain_id" => 4
            ],
            [
                "name" => "راننده ماشین سنگین",
                "activity_domain_id" => 5
            ],
            [
                "name" => "پیک موتوری",
                "activity_domain_id" => 5
            ],
            [
                "name" => "وانت بار",
                "activity_domain_id" => 5
            ],
            [
                "name" => "سرویس کارمندان",
                "activity_domain_id" => 5
            ],
        );
        DB::table('activity_domain_jobs')->insert($activity_domain_jobs);
    }
}
