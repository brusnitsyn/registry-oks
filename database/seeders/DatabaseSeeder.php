<?php

namespace Database\Seeders;

use App\Models\Complication;
use App\Models\ControlPoint;
use App\Models\ControlPointOption;
use App\Models\DiagnosType;
use App\Models\DispDopHealth;
use App\Models\DispState;
use App\Models\LekPrState;
use App\Models\Lpu;
use App\Models\Mkb;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'fio' => 'Администратор',
            'login' => 'admin',
            'password' => Hash::make('1234567'),
            'role_id' => 1
        ]);

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
            'name' => 'ХСН'
        ]);

        Mkb::create([
            'ds' => 'Z00.0',
            'name' => 'Общий медицинский осмотр',
            'rem' => '2101Z000',
            'begin_at' => Carbon::now()->subCenturies()->startOfCentury(),
            'end_at' => Carbon::now()->addCenturies()->endOfCentury()
        ]);

        Mkb::create([
            'ds' => 'Z01',
            'name' => 'Другие специальные осмотры и обследования лиц, не имеющих жалоб или установленного диагноза',
            'rem' => '2101Z01',
            'begin_at' => Carbon::now()->subCenturies()->startOfCentury(),
            'end_at' => Carbon::now()->addCenturies()->endOfCentury()
        ]);

        Role::create([
            'name' => 'Администратор',
            'slug' => 'administrator',
            'abilities' => '*',
        ]);
        Role::create([
            'name' => 'Оператор',
            'slug' => 'operator',
            'abilities' => 'operator:*',
        ]);
        Role::create([
            'name' => 'Врач',
            'slug' => 'doctor',
            'abilities' => 'doctor:*',
        ]);

        ControlPoint::create([
            'name' => '3-й день',
        ]);
        ControlPoint::create([
            'name' => '14-й день',
        ]);
        ControlPoint::create([
            'name' => '1 мес',
        ]);
        ControlPoint::create([
            'name' => '2 мес'
        ]);
        ControlPoint::create([
            'name' => '3 мес'
        ]);
        ControlPoint::create([
            'name' => '6 мес'
        ]);
        ControlPoint::create([
            'name' => '12 мес'
        ]);
        ControlPoint::create([
            'name' => '18 мес'
        ]);
        ControlPoint::create([
            'name' => '24 мес'
        ]);

        ControlPointOption::create([
            'name' => 'Норма'
        ]);
        ControlPointOption::create([
            'name' => 'В пределах нормы'
        ]);
        ControlPointOption::create([
            'name' => 'Требует консультации'
        ]);

        DispDopHealth::create([
            'name' => '1. Не требуется'
        ]);
        DispDopHealth::create([
            'name' => '2. Следующий этап ЧКВ'
        ]);
        DispDopHealth::create([
            'name' => '3. Контроль КАГ'
        ]);
        DispDopHealth::create([
            'name' => '4. АКШ'
        ]);
    }
}
