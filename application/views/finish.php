<section class="testInner">
    <div class="wrapper">
        <h1>Ваш результат</h1>
        <div class="testInnerResultWrap">
            <ul class="pseudo-bold">
                <li class="testInnerResultHead clearfix">
                    <div>Показатель</div>
                    <div>Значение</div>
                </li>
                <li class="clearfix testInnerResulItem">
                    <div>Потрачено времени</div>
                    <div><?=$finisTimeResult?></div>
                </li>
                <li class="clearfix testInnerResulItem">
                    <div>Количество баллов (правильных ответов)</div>
                    <div><?=$ball?></div>
                </li>
                <li class="clearfix testInnerResulItem">
                    <div>Максимально возможное количество баллов</div>
                    <div><?=$allAnswer?></div>
                </li>
                <li class="clearfix testInnerResulItem">
                    <div>Процент</div>
                    <div><?=$proc?></div>
                </li>
            </ul>
            <div class="testInerAssessment">
                Ваша оценка: <span><?=$grade?></span>
                <h3><?=$result_text?></h3>
                <h5><?=$dop_text?></h5>
            </div>
            <div class="testInerAssessmentBar">
                <div><span style="width:<?=$proc?>%;"></span></div>
            </div>
        </div>
    </div>
</section>