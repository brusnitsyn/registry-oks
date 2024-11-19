<?php

namespace Database\Seeders;

use App\Models\Complication;
use App\Models\DiagnosType;
use App\Models\DispState;
use App\Models\LekPrState;
use App\Models\Lpu;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Lpu::create([
            'full_name' => 'РСЦ Благовещенск',
        ]);
        Lpu::create([
            'full_name' => 'РСЦ Свободный',
        ]);
        Lpu::create([
            'full_name' => 'ПСО Благовещенск',
        ]);
        Lpu::create([
            'full_name' => 'ПСО Райчихинск',
        ]);
        Lpu::create([
            'full_name' => 'ПСО Зея',
        ]);
        Lpu::create([
            'full_name' => 'ПСО Тында',
        ]);

        DiagnosType::create([
            'code' => '03',
            'name' => 'Основной',
        ]);
        DiagnosType::create([
            'code' => '04',
            'name' => 'Сопутствующий',
        ]);

        DispState::create([
            'name' => 'Взят на учет'
        ]);
        DispState::create([
            'name' => 'Не взят на учет'
        ]);

        LekPrState::create([
            'name' => 'Получены',
        ]);
        LekPrState::create([
            'name' => 'Не получены',
        ]);

        Complication::create([
            'ХСН'
        ]);
    }
}
