<?php

namespace Database\Seeders;

use App\Models\DispCallBrief;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DispCallBriefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brief = DispCallBrief::create([
            'name' => 'Опросник для оператора'
        ]);

        ///
        /// Самочувтсвие
        ///
        $briefQuestionChapter = $brief->dispCallBriefQuestionChapters()->create([
            'name' => '1. Самочувствие'
        ]);

        $briefQuestion = $briefQuestionChapter->dispCallBriefQuestions()->create([
            'question' => 'Как Вы себя чувствуете на сегодняшний день?',
            'disp_call_brief_id' => $brief->id
        ]);

        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Отлично'
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Хорошо'
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Удовлетворительно'
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Плохо',
            'has_send_smp' => true,
            'has_send_doctor' => true
        ]);

        ///
        /// Боль
        ///
        $briefQuestionChapter = $brief->dispCallBriefQuestionChapters()->create([
            'name' => '2. Боль'
        ]);

        $briefQuestion = $briefQuestionChapter->dispCallBriefQuestions()->create([
            'question' => 'Бывает ли у Вас боль, тяжесть, давление в грудной клетке?',
            'disp_call_brief_id' => $brief->id
        ]);

        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Нет',
            'has_disable_other_answer' => true
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Да',
            'has_attention' => true
        ]);

        $briefQuestion = $briefQuestionChapter->dispCallBriefQuestions()->create([
            'question' => 'Боль возникает',
            'disp_call_brief_id' => $brief->id
        ]);

        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'При быстрой ходьбе, подъеме в гору',
            'has_send_smp' => true
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'В покое, положении лежа, сидя'
        ]);

        $briefQuestion = $briefQuestionChapter->dispCallBriefQuestions()->create([
            'question' => 'Длительность боли',
            'disp_call_brief_id' => $brief->id
        ]);

        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'До 15 минут',
            'has_send_smp' => true
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Несколько секунд, более 30 минут, часами'
        ]);

        $briefQuestion = $briefQuestionChapter->dispCallBriefQuestions()->create([
            'question' => 'Что Вы делаете при появлении боли?',
            'disp_call_brief_id' => $brief->id
        ]);

        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Останавливаюсь или принимаю нитроглицерин',
            'has_send_smp' => true
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Продолжаю идти в обычном темпе'
        ]);

        $briefQuestion = $briefQuestionChapter->dispCallBriefQuestions()->create([
            'question' => 'За последние дни боли стали чаще, интенсивнее? По интенсивности похожи как во время инфаркта миокарда?',
            'disp_call_brief_id' => $brief->id
        ]);

        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Да',
            'has_send_smp' => true
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Нет'
        ]);

        ///
        /// Одышка
        ///
        $briefQuestionChapter = $brief->dispCallBriefQuestionChapters()->create([
            'name' => '3. Одышка'
        ]);

        $briefQuestion = $briefQuestionChapter->dispCallBriefQuestions()->create([
            'question' => 'Беспокоит ли Вас одышка?',
            'disp_call_brief_id' => $brief->id
        ]);

        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'В покое, при ходьбе',
            'has_need_consult_doctor' => true
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Нет',
        ]);

        $briefQuestion = $briefQuestionChapter->dispCallBriefQuestions()->create([
            'question' => 'Есть отеки на ногах?',
            'disp_call_brief_id' => $brief->id
        ]);

        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Да',
            'has_need_consult_doctor' => true
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Нет',
        ]);

        $briefQuestion = $briefQuestionChapter->dispCallBriefQuestions()->create([
            'question' => 'Учащенное сердцебиение, перебои в работе сердца, чувство замирания',
            'disp_call_brief_id' => $brief->id
        ]);

        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Да',
            'has_need_consult_doctor' => true
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Нет',
        ]);

        ///
        /// Мониторинг АД/ЧСС
        ///
        $briefQuestionChapter = $brief->dispCallBriefQuestionChapters()->create([
            'name' => '4. Мониторинг АД/ЧСС'
        ]);

        $briefQuestion = $briefQuestionChapter->dispCallBriefQuestions()->create([
            'question' => 'Контроль АД',
            'disp_call_brief_id' => $brief->id
        ]);

        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => '100/70 мм рт. ст.',
            'has_need_consult_doctor' => true
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => '110-140/80 мм рт. ст.',
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => '>180/100 мм рт. ст.',
            'has_send_smp' => true
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => '<90 мм рт. ст.',
            'has_send_smp' => true
        ]);

        $briefQuestion = $briefQuestionChapter->dispCallBriefQuestions()->create([
            'question' => 'Контроль ЧСС',
            'disp_call_brief_id' => $brief->id
        ]);

        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => '<40 ударов в минуту',
            'has_send_smp' => true
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => '45-55 ударов в минуту',
            'has_need_consult_doctor' => true
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => '55-70 ударов в минуту',
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => '>80 ударов в минуту',
            'has_need_consult_doctor' => true
        ]);

        ///
        /// Выписка
        ///
        $briefQuestionChapter = $brief->dispCallBriefQuestionChapters()->create([
            'name' => '5. Выписка'
        ]);

        $briefQuestion = $briefQuestionChapter->dispCallBriefQuestions()->create([
            'question' => 'После выписки из стационара Вас посетил участковый врач (Вы обратились на прием)?',
            'disp_call_brief_id' => $brief->id
        ]);

        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Да',
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Нет',
            'has_send_doctor' => true
        ]);

        ///
        /// Медицинские препараты
        ///
        $briefQuestionChapter = $brief->dispCallBriefQuestionChapters()->create([
            'name' => '6. Медицинские препараты'
        ]);

        $briefQuestion = $briefQuestionChapter->dispCallBriefQuestions()->create([
            'question' => 'Вы получили препараты, рекомендованные Вам кардиологом при выписке из стационара?',
            'disp_call_brief_id' => $brief->id
        ]);

        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Выдали в стационаре при выписке',
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Выписали рецепты в поликлинике',
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Нет',
            'has_need_consult_doctor' => true
        ]);

        $briefQuestion = $briefQuestionChapter->dispCallBriefQuestions()->create([
            'question' => 'Вы принимаете в настоящее время препараты, препятствующие тромбозу стентов? (Ацетилсалициловая кислота, Клопидогрел, Тикагрелор (Брилинта)',
            'disp_call_brief_id' => $brief->id
        ]);

        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Да',
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Нет',
            'has_attention' => true
        ]);

        $briefQuestion = $briefQuestionChapter->dispCallBriefQuestions()->create([
            'question' => 'Вы принимаете назначенные препараты в прежних дозировках?',
            'disp_call_brief_id' => $brief->id
        ]);

        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Да',
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Нет',
            'has_attention' => true
        ]);

        $briefQuestion = $briefQuestionChapter->dispCallBriefQuestions()->create([
            'question' => 'Была ли у Вас замена или отмена препаратов?',
            'disp_call_brief_id' => $brief->id
        ]);

        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Да',
            'has_attention' => true
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Нет',
        ]);


        $briefQuestion = $briefQuestionChapter->dispCallBriefQuestions()->create([
            'question' => 'По чьей инициативе отменены или заменены препараты?',
            'disp_call_brief_id' => $brief->id
        ]);

        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Врач',
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Самостоятельно',
            'has_attention' => true
        ]);

        $briefQuestion = $briefQuestionChapter->dispCallBriefQuestions()->create([
            'question' => 'Как давно Вы отменили эти  препараты?',
            'disp_call_brief_id' => $brief->id
        ]);

        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'До 5 дней',
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Более 5 дней',
            'has_attention' => true
        ]);

        ///
        /// Следующий визит
        ///
        $briefQuestionChapter = $brief->dispCallBriefQuestionChapters()->create([
            'name' => '7. Следующий визит'
        ]);

        $briefQuestion = $briefQuestionChapter->dispCallBriefQuestions()->create([
            'question' => 'Участковый терапевт/кардиолог сообщили Вам дату следующего визита?',
            'disp_call_brief_id' => $brief->id
        ]);

        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Да',
        ]);
        $briefQuestion->dispCallBriefAnswers()->create([
            'answer' => 'Нет',
            'has_attention' => true
        ]);
    }
}
