<div class="container" style="padding: 0px 120px">
    <strong>
        <center>Редактирование/Просмотр ответа и вопроса</center>
    </strong>
    <!--- ВОПРОС -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Вопрос+</a>
            </h4>
        </div>
        <form action="">
            <div id="collapse1" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="ques">Вопрос:</label>
                        <input type="text" class="form-control" id="ques" value="<?= $row[0]->question ?>">
                    </div>
                </div>
            </div>
    </div>
    <!--- ОТВЕТЫ -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Ответы+</a>
            </h4>
        </div>
        <div id="collapse2" class="panel-collapse collapse">
            <div class="panel-body">
                <!-- -------    ANSWER 111   ----------- -->
                <?php if (!empty($row[0]->answer_1) && $row[0]->img_status == 0): ?>
                    <input class="form-control" type="text" name="check" value="<?= $row[0]->answer_1 ?>">
                <?php elseif (!empty($row[0]->answer_1) && $row[0]->img_status == 1): ?>
                    <div class="for-img">
                        <img class="img"
                             src="<?= base_url() ?>public/images/answer-photo/<?= $row[0]->answer_1 ?>" alt="">
                    </div>
                <?php endif; ?>
                <!-- -------    ANSWER 222   ----------- -->
                <?php if (!empty($row[0]->answer_2) && $row[0]->img_status == 0): ?>
                    <input class="form-control" type="text" name="check" value="<?= $row[0]->answer_2 ?>">
                <?php elseif (!empty($row[0]->answer_2) && $row[0]->img_status == 1): ?>
                    <div class="for-img">
                        <img class="img"
                             src="<?= base_url() ?>public/images/answer-photo/<?= $row[0]->answer_2 ?>" alt="">
                    </div>
                <?php endif; ?>

                <!-- -------    ANSWER 333   ----------- -->
                <?php if (!empty($row[0]->answer_3) && $row[0]->img_status == 0): ?>
                    <input class="form-control" type="text" name="check" value="<?= $row[0]->answer_3 ?>">
                <?php elseif (!empty($row[0]->answer_3) && $row[0]->img_status == 1): ?>
                    <div class="for-img">
                        <img class="img"
                             src="<?= base_url() ?>public/images/answer-photo/<?= $row[0]->answer_3 ?>" alt="">
                    </div>
                <?php endif; ?>
                <!-- -------    ANSWER 444   ----------- -->
                <?php if (!empty($row[0]->answer_4) && $row[0]->img_status == 0): ?>
                    <input class="form-control" type="text" name="check" value="<?= $row[0]->answer_4 ?>">
                <?php elseif (!empty($row[0]->answer_4) && $row[0]->img_status == 1): ?>
                    <div class="for-img">
                        <img class="img"
                             src="<?= base_url() ?>public/images/answer-photo/<?= $row[0]->answer_4 ?>" alt="">
                    </div>
                <?php endif; ?>
                <!-- -------    ANSWER 555   ----------- -->
                <?php if (!empty($row[0]->answer_5) && $row[0]->img_status == 0): ?>
                    <input class="form-control" type="text" name="check" value="<?= $row[0]->answer_5 ?>">
                <?php elseif (!empty($row[0]->answer_5) && $row[0]->img_status == 1): ?>
                    <div class="for-img">
                        <img class="img"
                             src="<?= base_url() ?>public/images/answer-photo/<?= $row[0]->answer_5 ?>" alt="">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!--- RIGHT answer -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Правильные ответы+</a>
            </h4>
        </div>
        <div id="collapse3" class="panel-collapse collapse">
            <div class="panel-body">
                <label for="">Выбранный ответы: <?= $row[0]->correct_answer ?></label>
                <div class="form-group">
                    <label for="">Выберите правильный ответ:</label> <br>
                    <div class="checkbox">
                        <label><input type="checkbox" name="right-1" value="1">Ответ №1</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="right-2" value="2">Ответ №2</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="right-3" value="3">Ответ №3</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="right-4" value="4">Ответ №4</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="right-5" value="5">Ответ №5</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    <input type="submit" class="btn btn-success" value="Изменить">-->
    </form>
</div>