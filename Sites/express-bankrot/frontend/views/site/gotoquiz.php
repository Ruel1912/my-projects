<?php
    use yii\helpers\Url;
?>

<aside class="GoToQuizCard">
    <div class="GoToQuizCard_info">
        <h2 class="GoToQuizCard_info-title">
            Рассчитайте стоимость списания ваших долгов
        </h2>
        <p class="GoToQuizCard_info-undertitle">
            Ответьте на 3 вопроса и получите:
        </p>
        <ul class="GoToQuizCard_info_group">
            <li class="GoToQuizCard_info_group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 28 28">
                    <path stroke="#fff" stroke-linecap="round" stroke-width="2"
                        d="m8 15 3.605 3.605a.5.5 0 0 0 .744-.041L20 9" />
                </svg>
                Индивидуальную скидку за каждый ответ!
            </li>
            <li class="GoToQuizCard_info_group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 28 28">
                    <path stroke="#fff" stroke-linecap="round" stroke-width="2"
                        d="m8 15 3.605 3.605a.5.5 0 0 0 .744-.041L20 9" />
                </svg>
                Подробный план списания ваших долгов
            </li>
            <li class="GoToQuizCard_info_group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 28 28">
                    <path stroke="#fff" stroke-linecap="round" stroke-width="2"
                        d="m8 15 3.605 3.605a.5.5 0 0 0 .744-.041L20 9" />
                </svg>
                Сроки и стоимость списания
            </li>
        </ul>
        <a class="btn btn--blue" href="<?= Url::to(['quiz']) ?>">Рассчитать стоимость</a>
    </div>
</aside>