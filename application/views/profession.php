<section class="testInner">
    <!--  Хидден инпуты которые нужны для теста  -->
    <input id="url" type="hidden" value="<?= base_url() ?>">
    <label for=""><input id="last" type="hidden" value="<?= $last ?>"></label>
    <label for=""><input id="all" type="hidden" value="<?= $all ?>"></label>
    <div class="wrapper">
        <div class="testInnerBlock">
            <div class="testInnerBlockDes pseudo-bold">
                <p>В тесте 12 вопросов. Внимательно прочитайте вопрос и из предложенных вариантов, выберите один.
                    Ответив на вопрос, нажмите на кнопку "Далее". После прохождения теста, не закрывайте окно, пока не
                    увидите Ваш результат.</p>
            </div>
            <div class="testQuestionAnswer">
                <div class="wrapRadioForm clearfix pseudo-bold">
                    <?php foreach ($question

                    as $row): ?>
                    <!--   Инпуты хидден  -->
                    <input type="hidden" id="id" value="<?= $row['id'] ?>">
                    <h3><?= htmlentities($row['question']) ?></h3>
                    <?php if (!empty($row['img_name'])): ?>
                        <div class="for-img">
                            <img class="img" src="<?= base_url() ?>public/images/answer-photo/<?= $row['img_name'] ?>"
                                 alt="">
                        </div>
                    <?php endif; ?>
                    <!--    111111       -->
                    <label class="CustomizeLabel">
                        <?php if (!empty($row['answer_1']) && $row['img_status'] == 0): ?>
                            <input type="checkbox" name="check[]" data-ans="1" value="1">
                            <span class="checkmark"></span>
                            <span><?= htmlentities($row['answer_1']) ?></span>
                        <?php elseif (!empty($row['answer_1'])): ?>
                            <div class="for-img">
                                <img class="img"
                                     src="<?= base_url() ?>public/images/answer-photo/<?= $row['answer_1'] ?>" alt="">
                                <span class="checkmark"></span>
                                <input type="checkbox" name="check[]" data-ans="1" value="1">
                            </div>
                        <?php endif; ?>
                    </label>
                    <!--    222222     -->
                    <label class="CustomizeLabel">
                        <?php if (!empty($row['answer_2']) && $row['img_status'] == 0): ?>
                            <input type="checkbox" name="check[]" data-ans="2" value="2">
                            <span class="checkmark"></span>
                            <span><?= htmlentities($row['answer_2']) ?></span>
                        <?php elseif (!empty($row['answer_2'])): ?>
                            <div class="for-img">
                                <img class="img"
                                     src="<?= base_url() ?>public/images/answer-photo/<?= $row['answer_2'] ?>" alt="">
                                <span class="checkmark"></span>
                                <input type="checkbox" name="check[]" data-ans="2" value="2">
                            </div>
                        <?php endif; ?>
                    </label>

                    <!--    333333      -->
                    <label class="CustomizeLabel">
                        <?php if (!empty($row['answer_3']) && $row['img_status'] == 0): ?>
                            <input type="checkbox" name="check[]" data-ans="3" value="3">
                            <span class="checkmark"></span>
                            <span><?= htmlentities($row['answer_3']) ?></span>
                        <?php elseif (!empty($row['answer_3'])): ?>
                            <div class="for-img">
                                <img class="img"
                                     src="<?= base_url() ?>public/images/answer-photo/<?= $row['answer_3'] ?>" alt="">
                                <span class="checkmark"></span>
                                <input type="checkbox" name="check[]" data-ans="3" value="3">
                            </div>
                        <?php endif; ?>
                    </label>
                    <!--   4444      -->
                    <label class="CustomizeLabel">
                        <?php if (!empty($row['answer_4']) && $row['img_status'] == 0): ?>
                            <input type="checkbox" name="check[]" data-ans="4" value="4">
                            <span class="checkmark"></span>
                            <span><?= htmlentities($row['answer_4']) ?></span>
                        <?php elseif (!empty($row['answer_4'])): ?>
                            <div class="for-img">
                                <img class="img"
                                     src="<?= base_url() ?>public/images/answer-photo/<?= $row['answer_4'] ?>" alt="">
                                <input type="checkbox" name="check[]" data-ans="4" value="4">
                            </div>
                        <?php endif; ?>
                    </label>
                    <!--     555555     -->
                    <label class="CustomizeLabel">
                        <?php if (!empty($row['answer_5']) && $row['img_status'] == 0): ?>
                            <input type="checkbox" name="check[]" data-ans="5" value="5">
                            <span class="checkmark"></span>
                            <span><?= htmlentities($row['answer_5']) ?></span>
                        <?php elseif (!empty($row['answer_5'])): ?>
                            <div class="for-img">
                                <img class="img"
                                     src="<?= base_url() ?>public/images/answer-photo/<?= $row['answer_5'] ?>" alt="">
                                <input type="checkbox" name="check[]" data-ans="5" value="5">
                            </div>
                        <?php endif; ?>
                    </label>
                </div>
                <?php endforeach; ?>
                <div class="testB-submit clearfix">
                    <div class="testB-submit clearfix">
                        <button onclick="showend()" style="display: none" class="testSubmitbtn aBtn" id="end_button">Завершить</button>
                        <?php
                        echo $this->pagination->create_links();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    window.onload = function() {
        var inp = document.getElementsByTagName('INPUT');
        var chk_boxes = [];
        var cnt = 0;
        for(var ee=0; ee < inp.length; ++ee) {
            var e = inp[ee];
            if(e.type !== 'checkbox') continue;
            chk_boxes.push(e);
            e.addEventListener('change', function(){
                var need = false, state;
                if(this.checked) {
                    ++cnt;
                    need = cnt === 2;
                    state = true;
                }
                else {
                    --cnt;
                    need = cnt === 1;
                    state = false;
                }
                if(need) {
                    chk_boxes.forEach(function(c) {
                        if(!c.checked) {
                            c.disabled = state;
                        }
                    });
                }
            })
        }
    };
</script>