<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Онлайн-тест</title>
    <link rel="stylesheet" href="<?= base_url() ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/css/testStyle.css">
    <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>public/js/test.js" defer></script>
</head>
<body>
<div class="container">
    <div class="row jumbotron">
        <input id="url" type="hidden" value="<?= base_url() ?>">
        <input id="last" type="text" value="<?= $last ?>">
        <h4>Вопрос:</h4>
        <div class="col-sm-6 flex-wrap">
            <ul class="list-unstyled">
                <?php foreach ($question as $row): ?>
                    <input type="text" id="id" value="<?= $row['id'] ?>">
                    <div class="border-questions">
                        <li><?= $row['question'] ?></li>
                        <?php if (!empty($row['img_name'])): ?>
                            <div class="for-img">
                                <img class="img"
                                     src="<?= base_url() ?>public/images/question-photo/<?= $row['img_name'] ?>" alt="">
                            </div>
                        <?php endif; ?>
                    </div>
                    <h4>Ответы:</h4>
                    <!-- 111111 -->
                    <div class="checkbox">
                        <?php if (!empty($row['answer_1']) && $row['img_status'] == 0): ?>
                            <label><input type="checkbox" name="check[]" data-ans="1" value="1"><?= $row['answer_1'] ?>
                            </label>
                        <?php elseif (!empty($row['answer_1'])): ?>
                            <div class="for-img">
                                <img class="img"
                                     src="<?= base_url() ?>public/images/answer-photo/<?= $row['answer_1'] ?>" alt="">
                                <input type="checkbox" name="check[]" data-ans="1" value="1">
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- 22222 -->
                    <div class="checkbox">
                        <?php if (!empty($row['answer_2']) && $row['img_status'] == 0): ?>
                            <label><input type="checkbox" name="check[]" data-ans="2" value="2"><?= $row['answer_2'] ?>
                            </label>
                        <?php elseif (!empty($row['answer_2'])): ?>
                            <div class="for-img">
                                <img class="img"
                                     src="<?= base_url() ?>public/images/answer-photo/<?= $row['answer_2'] ?>" alt="">
                                <input type="checkbox" name="check[]" data-ans="2" value="2">
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- 33333 -->
                    <div class="checkbox">
                        <?php if (!empty($row['answer_3']) && $row['img_status'] == 0): ?>
                            <label><input type="checkbox" name="check[]" data-ans="3" value="3"><?= $row['answer_3'] ?>
                            </label>
                        <?php elseif (!empty($row['answer_3'])): ?>
                            <div class="for-img">
                                <img class="img"
                                     src="<?= base_url() ?>public/images/answer-photo/<?= $row['answer_3'] ?>" alt="">
                                <input type="checkbox" name="check[]" data-ans="3" value="3">
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- 4444 -->
                    <div class="checkbox">
                        <?php if (!empty($row['answer_4']) && $row['img_status'] == 0): ?>
                            <label><input type="checkbox" name="check[]" data-ans="4" value="4"><?= $row['answer_4'] ?>
                            </label>
                        <?php elseif (!empty($row['answer_4'])): ?>
                            <div class="for-img">
                                <img class="img"
                                     src="<?= base_url() ?>public/images/answer-photo/<?= $row['answer_4'] ?>" alt="">
                                <input type="checkbox" name="check[]" data-ans="4" value="4">
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- 5555 -->
                    <div class="checkbox">
                        <?php if (!empty($row['answer_5']) && $row['img_status'] == 0): ?>
                            <label><input type="checkbox" name="check[]" data-ans="5" value="5"><?= $row['answer_5'] ?>
                            </label>
                        <?php elseif (!empty($row['answer_5'])): ?>
                            <div class="for-img">
                                <img class="img"
                                     src="<?= base_url() ?>public/images/answer-photo/<?= $row['answer_5'] ?>" alt="">
                                <input type="checkbox" name="check[]" data-ans="5" value="5">
                            </div>
                        <?php endif; ?>
                    </div>

                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <button onclick="showend()" style="display: none" id="end_button">Завершить</button>
    <?php
    echo $this->pagination->create_links();
    ?>
</div>
</body>
</html>