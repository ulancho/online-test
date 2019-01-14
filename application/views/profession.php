<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Онлайн-тест</title>
    <link rel="stylesheet" href="<?=base_url()?>public/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <ul class="list-unstyled">
            <?php foreach ($question as $row):?>
                <li><?=$row['question']?></li>
                <div class="checkbox">
                    <label><input type="checkbox" value=""><?=$row['answer_1']?></label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" value=""><?=$row['answer_2']?></label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" value=""><?=$row['answer_3']?></label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" value=""><?=$row['answer_4']?></label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" value=""><?=$row['answer_4']?></label>
                </div>

            <?php endforeach;?>
        </ul>
    </div>
    <?php
    echo $this->pagination->create_links();
    ?>
</div>
</body>
</html>