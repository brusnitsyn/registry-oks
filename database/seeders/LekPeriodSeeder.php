<?php

namespace Database\Seeders;

use App\Models\LekPeriod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LekPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LekPeriod::create([ 'name' => '1 месяц' ]);
        LekPeriod::create([ 'name' => '2 месяца' ]);
        LekPeriod::create([ 'name' => '3 месяца' ]);
    }
}
