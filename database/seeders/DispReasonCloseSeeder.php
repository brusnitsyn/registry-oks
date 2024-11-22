<?php

namespace Database\Seeders;

use App\Models\DispReasonClose;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DispReasonCloseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DispReasonClose::create([ 'num' => '1', 'name' => 'Выздоровление' ]);
        DispReasonClose::create([ 'num' => '4', 'name' => 'Смерть' ]);
        DispReasonClose::create([ 'num' => '5', 'name' => 'Прочие' ]);
        DispReasonClose::create([ 'num' => '6', 'name' => 'Снятие диагноза' ]);

        DispReasonClose::create([ 'num' => '21', 'name' => 'Выбытие в другой субъект РФ' ]);
        DispReasonClose::create([ 'num' => '22', 'name' => 'Выбытие за пределы РФ' ]);
        DispReasonClose::create([ 'num' => '31', 'name' => 'Перевод в другую медицинскую организацию' ]);
        DispReasonClose::create([ 'num' => '32', 'name' => 'Перевод в ведомственную организацию (в том числе ФСИН)' ]);
    }
}
