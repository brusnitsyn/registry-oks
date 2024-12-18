<?php

namespace Database\Seeders;

use App\Models\Complication;
use App\Models\ConcoDiag;
use App\Models\ControlPoint;
use App\Models\ControlPointOption;
use App\Models\DiagnosType;
use App\Models\DispDopHealth;
use App\Models\DispReasonClose;
use App\Models\DispState;
use App\Models\LekPeriod;
use App\Models\LekPrState;
use App\Models\Lpu;
use App\Models\Mkb;
use App\Models\ResultCall;
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
//        User::create([
//            'fio' => 'Администратор',
//            'login' => 'admin',
//            'password' => Hash::make('1234567'),
//            'role_id' => 1
//        ]);
//
//        User::create([
//            'fio' => 'Оператор',
//            'login' => 'operator',
//            'password' => Hash::make('1234567'),
//            'role_id' => 2
//        ]);
//
//        User::create([
//            'fio' => 'Врач',
//            'login' => 'doctor',
//            'password' => Hash::make('1234567'),
//            'role_id' => 3
//        ]);

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
            'name' => 'Взят на диспансерный учет'
        ]);
        DispState::create([
            'name' => 'Не взят на диспансерный учет'
        ]);

        LekPrState::create([
            'name' => 'Получены',
        ]);
        LekPrState::create([
            'name' => 'Не получены',
        ]);

        Complication::create([
            'name' => 'ХСН (ФВ ≤40%)'
        ]);
        Complication::create([
            'name' => 'Фибрилляция предсердий'
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
//        ControlPoint::create([
//            'name' => '14-й день',
//        ]);
        ControlPoint::create([
            'name' => '1 мес',
        ]);
//        ControlPoint::create([
//            'name' => '2 мес'
//        ]);
        ControlPoint::create([
            'name' => '3 мес'
        ]);
        ControlPoint::create([
            'name' => '6 мес'
        ]);
        ControlPoint::create([
            'name' => '12 мес'
        ]);
//        ControlPoint::create([
//            'name' => '18 мес'
//        ]);
//        ControlPoint::create([
//            'name' => '24 мес'
//        ]);

        ControlPointOption::create([
            'num' => '0',
            'name' => 'Без результата'
        ]);
        ControlPointOption::create([
            'num' => '1',
            'name' => 'Норма'
        ]);
        ControlPointOption::create([
            'num' => '2',
            'name' => 'В пределах нормы'
        ]);
        ControlPointOption::create([
            'num' => '3',
            'name' => 'Требует консультации'
        ]);
        ControlPointOption::create([
            'num' => '4',
            'name' => 'Вызов врача на дом'
        ]);
        ControlPointOption::create([
            'num' => '5',
            'name' => 'Вызов СМП'
        ]);

        DispDopHealth::create([
            'name' => 'Не требуется',
            'short_name' => 'Не требуется'
        ]);
        DispDopHealth::create([
            'name' => 'Следующий этап ЧКВ',
            'short_name' => 'ЧКВ'
        ]);
        DispDopHealth::create([
            'name' => 'Контроль КАГ',
            'short_name' => 'КАГ'
        ]);
        DispDopHealth::create([
            'name' => 'АКШ',
            'short_name' => 'АКШ'
        ]);
        DispDopHealth::create([
            'name' => 'Консультация кардиохирурга',
            'short_name' => 'Консультация'
        ]);

        Mkb::create([ 'ds' => 'I20.0',  'name' => 'Нестабильная стенокардия (впервые возникшая, прогрессирующая)', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
        Mkb::create([ 'ds' => 'I21.0',  'name' => 'Острый трансмуральный инфаркт передней стенки миокарда', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
        Mkb::create([ 'ds' => 'I21.1',  'name' => 'Острый трансмуральный инфаркт нижней стенки миокарда', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
        Mkb::create([ 'ds' => 'I21.2',  'name' => 'Острый трансмуральный инфаркт миокарда других уточненных локализаций', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
        Mkb::create([ 'ds' => 'I21.3',  'name' => 'Острый трансмуральный инфаркт миокарда других неуточненной локализации', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
        Mkb::create([ 'ds' => 'I21.4',  'name' => 'Острый субэндокардиальный инфаркт миокарда', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
        Mkb::create([ 'ds' => 'I22.0',  'name' => 'Повторный инфаркт передней стенки миокарда', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
        Mkb::create([ 'ds' => 'I22.1',  'name' => 'Повторный инфаркт нижней стенки миокарда', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
        Mkb::create([ 'ds' => 'I22.8',  'name' => 'Повторный инфаркт миокарда другой уточненной локализации', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);

        ConcoDiag::create([ 'name' => 'Гипертоническая болезнь' ]);
        ConcoDiag::create([ 'name' => 'Сахарный диабет' ]);

        ResultCall::create([ 'name' => 'Успешный' ]);
        ResultCall::create([ 'name' => 'Не берет трубку/выключен телефон' ]);
        ResultCall::create([ 'name' => 'Пациент отказывается от предоставления информации' ]);

        DispReasonClose::create([ 'num' => '1', 'name' => 'Истечение времени' ]);
        DispReasonClose::create([ 'num' => '2', 'name' => 'Повторное событие' ]);
        DispReasonClose::create([ 'num' => '3', 'name' => 'Смерть' ]);

        LekPeriod::create([ 'name' => '1 месяц' ]);
        LekPeriod::create([ 'name' => '2 месяца' ]);
        LekPeriod::create([ 'name' => '3 месяца' ]);

//        Mkb::create([ 'ds' => 'I21.0',  'name' => 'Острый трансмуральный инфаркт передней стенки миокарда', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I21.1',  'name' => 'Острый трансмуральный инфаркт нижней стенки миокарда', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I21.2',  'name' => 'Острый трансмуральный инфаркт миокарда других уточненных локализаций', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I21.3',  'name' => 'Острый трансмуральный инфаркт миокарда неуточненной локализации', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I21.9',  'name' => 'Острый инфаркт миокарда неуточненный', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I22.0',  'name' => 'Повторный инфаркт передней стенки миокарда', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I22.1',  'name' => 'Повторный инфаркт нижней стенки миокарда', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I22.8',  'name' => 'Повторный инфаркт миокарда другой уточненной локализации', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I22.9',  'name' => 'Повторный инфаркт миокарда неуточненной локализации', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I24.0',  'name' => 'Коронарный тромбоз, не приводящий к инфаркту миокарда', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I24.8',  'name' => 'Другие формы острой ишемической болезни сердца', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I24.9',  'name' => 'Острая ишемическая болезнь сердца неуточненная', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I20.0',  'name' => 'Нестабильная стенокардия', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I21.4',  'name' => 'Острый субэндокардиальный инфаркт миокарда.', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'G45.0',  'name' => 'Синдром вертебробазилярной артериальной системы', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'G45.1',  'name' => 'Синдром сонной артерии (полушарный)', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'G45.2',  'name' => 'Множественные и двусторонние синдромы прецеребральных артерий', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'G45.3',  'name' => 'Преходящая слепота', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'G45.4',  'name' => 'Транзиторная глобальная амнезия', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'G45.8',  'name' => 'Другие транзиторные церебральные ишемические атаки и связанные с ними синдромы', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'G45.9',  'name' => 'Транзиторная церебральная ишемическая атака неуточненнаяG46 Сосудистые мозговые синдромы при цереброваскулярных болезнях', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'G46.0',  'name' => 'Синдром средней мозговой артерии', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'G46.1',  'name' => 'Синдром передней мозговой артерии', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'G46.2',  'name' => 'Синдром задней мозговой артерии', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'G46.3',  'name' => 'Синдром инсульта ствола головного мозга', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'G46.4',  'name' => 'Синдром мозжечкового инсульта', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'G46.5',  'name' => 'Чисто двигательный лакунарный синдром', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'G46.6',  'name' => 'Чисто чувствительный лакунарный синдром', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'G46.7',  'name' => 'Другие лакунарные синдромы', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'G46.8',  'name' => 'Другие сосудистые синдромы головного мозга при цереброваскулярных болезнях', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I60.0',  'name' => 'Субарахноидальное кровоизлияние из каротидного синуса и бифуркации', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I60.1',  'name' => 'Субарахноидальное кровоизлияние из средней мозговой артерии', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I60.2',  'name' => 'Субарахноидальное кровоизлияние из передней соединительной артерии', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I60.3',  'name' => 'Субарахноидальное кровоизлияние из задней соединительной артерии', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I60.4',  'name' => 'Субарахноидальное кровоизлияние из базилярной артерии', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I60.5',  'name' => 'Субарахноидальное кровоизлияние из позвоночной артерии', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I60.6',  'name' => 'Субарахноидальное кровоизлияние из других внутричерепных артерий', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I60.7',  'name' => 'Субарахноидальное кровоизлияние из внутричерепной артерии неуточненной', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I60.8',  'name' => 'Другое субарахноидальное кровоизлияние', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I60.9',  'name' => 'Субарахноидальное кровоизлияние неуточненное', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I61.0',  'name' => 'Внутримозговое кровоизлияние в полушарие субкортикальное', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I61.1',  'name' => 'Внутримозговое кровоизлияние в полушарие кортикальное', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I61.2',  'name' => 'Внутримозговое кровоизлияние в полушарие неуточненное', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I61.3',  'name' => 'Внутримозговое кровоизлияние в ствол мозга', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I61.4',  'name' => 'Внутримозговое кровоизлияние в мозжечок', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I61.5',  'name' => 'Внутримозговое кровоизлияние внутрижелудочковое', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I61.6',  'name' => 'Внутримозговое кровоизлияние множественной локализации', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I61.8',  'name' => 'Другое внутримозговое кровоизлияние', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I61.9',  'name' => 'Внутримозговое кровоизлияние неуточненное', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I62.0',  'name' => 'Субдуральное кровоизлияние (острое) (нетравматическое)', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I62.1',  'name' => 'Нетравматическое экстрадуральное кровоизлияние', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I62.9',  'name' => 'Внутричерепное кровоизлияние (нетравматическое) неуточненное', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I63.0',  'name' => 'Инфаркт мозга, вызванный тромбозом прецеребральных артерий', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I63.1',  'name' => 'Инфаркт мозга, вызванный эмболией прецеребральных артерий', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I63.2',  'name' => 'Инфаркт мозга, вызванный неуточненной закупоркой или стенозом прецеребральных артерий', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I63.3',  'name' => 'Инфаркт мозга, вызванный тромбозом мозговых артерий', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I63.4',  'name' => 'Инфаркт мозга, вызванный эмболией мозговых артерий', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I63.5',  'name' => 'Инфаркт мозга, вызванный неуточненной закупоркой или стенозом мозговых артерий', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I63.6',  'name' => 'Инфаркт мозга, вызванный тромбозом вен мозга, непиогенный', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I63.8',  'name' => 'Другой инфаркт мозга', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I63.9',  'name' => 'Инфаркт мозга неуточненный', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I64.',  'name' => 'Инсульт, не уточненный как кровоизлияние или инфаркт', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I69.0',  'name' => 'Последствия субарахноидального кровоизлияния', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I69.1',  'name' => 'Последствия внутричерепного кровоизлияния', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I69.2',  'name' => 'Последствия другого нетравматического внутричерепного кровоизлияния', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I69.3',  'name' => 'Последствия инфаркта мозга', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I69.4',  'name' => 'Последствия инсульта, не уточненные как кровоизлияние или инфаркт мозга', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
//        Mkb::create([ 'ds' => 'I69.8',  'name' => 'Последствия других и неуточненных цереброваскулярных болезней', 'begin_at' => Carbon::now()->subCenturies()->startOfCentury(), 'end_at' => Carbon::now()->addCenturies()->endOfCentury() ]);
    }
}
