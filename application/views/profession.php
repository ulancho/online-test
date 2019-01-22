<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Онлайн-тест</title>
    <link rel="stylesheet" href="<?=base_url()?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>public/css/testStyle.css">
    <script src="<?=base_url()?>public/js/test.js"></script>
</head>
<body>
<div class="container">
    <div class="row jumbotron">
        <h4>Вопрос:</h4>
        <div class="col-sm-6 flex-wrap">
                <ul class="list-unstyled">
                    <?php foreach ($question as $row):?>
                    <div class="border-questions">
                        <li><?=$row['question']?></li>
                        <?php if (!empty($row['img_name'])): ?>
                            <div class="for-img">
                                <img class="img" src="<?=base_url()?>public/images/question-photo/<?=$row['img_name']?>" alt="">
                            </div>
                        <?php endif; ?>
                    </div>
                    <h4>Ответы:</h4>
                   <!-- 111111 -->
                        <div class="checkbox">
                            <?php if (!empty($row['answer_1']) && $row['img_status'] == 0): ?>
                                <label><input onchange="addLocal(this)" type="checkbox" data-id="<?=$row['id']?>" data-ans="1" value=""><?=$row['answer_1']?></label>
                               <?php elseif(!empty($row['answer_1'])):?>
                                       <div class="for-img">
                                           <img class="img" src="<?=base_url()?>public/images/answer-photo/<?=$row['answer_1']?>" alt="">
                                       <input onchange="addLocal(this)" type="checkbox" data-id="<?=$row['id']?>" data-ans="1" value="">
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- 22222 -->
                        <div class="checkbox">
                            <?php if (!empty($row['answer_2']) && $row['img_status'] == 0): ?>
                                <label><input onchange="addLocal(this)" type="checkbox" data-id="<?=$row['id']?>" data-ans="2" value=""><?=$row['answer_2']?></label>
                            <?php elseif(!empty($row['answer_2'])):?>
                                <div class="for-img">
                                    <img class="img" src="<?=base_url()?>public/images/answer-photo/<?=$row['answer_2']?>" alt="">
                                    <input onchange="addLocal(this)" type="checkbox" data-id="<?=$row['id']?>" data-ans="2" value="">
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- 33333 -->
                        <div class="checkbox">
                            <?php if (!empty($row['answer_3']) && $row['img_status'] == 0): ?>
                                <label><input onchange="addLocal(this)" type="checkbox" data-id="<?=$row['id']?>" data-ans="3" value=""><?=$row['answer_3']?></label>
                            <?php elseif(!empty($row['answer_3'])):?>
                                <div class="for-img">
                                    <img class="img" src="<?=base_url()?>public/images/answer-photo/<?=$row['answer_3']?>" alt="">
                                    <input onchange="addLocal(this)" type="checkbox" data-id="<?=$row['id']?>" data-ans="3" value="">
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- 4444 -->
                        <div class="checkbox">
                            <?php if (!empty($row['answer_4']) && $row['img_status'] == 0): ?>
                                <label><input onchange="addLocal(this)" type="checkbox" data-id="<?=$row['id']?>" data-ans="4" value=""><?=$row['answer_4']?></label>
                            <?php elseif(!empty($row['answer_4'])):?>
                                <div class="for-img">
                                    <img class="img" src="<?=base_url()?>public/images/answer-photo/<?=$row['answer_4']?>" alt="">
                                    <input onchange="addLocal(this)" type="checkbox" data-id="<?=$row['id']?>" data-ans="4" value="">
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- 5555 -->
                        <div class="checkbox">
                            <?php if (!empty($row['answer_5']) && $row['img_status'] == 0): ?>
                                <label><input onchange="addLocal(this)" type="checkbox" data-id="<?=$row['id']?>" data-ans="5" value=""><?=$row['answer_5']?></label>
                            <?php elseif(!empty($row['answer_5'])):?>
                                <div class="for-img">
                                    <img class="img" src="<?=base_url()?>public/images/answer-photo/<?=$row['answer_5']?>" alt="">
                                    <input onchange="addLocal(this)" type="checkbox" data-id="<?=$row['id']?>" data-ans="5" value="">
                                </div>
                            <?php endif; ?>
                        </div>

                    <?php endforeach;?>
                </ul>
            </div>
    </div>
    <?php
    echo $this->pagination->create_links();
    ?>
</div>
</body>
</html>