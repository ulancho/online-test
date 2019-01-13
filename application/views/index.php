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
        <h2 class="text-center">Тесты</h2>
        <ul class="list-unstyled">
            <?php foreach ($profession as $row):?>
               <li><a href="<?=base_url()?>welcome/profession/<?=$row['table_name']?>"><?=$row['name']?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
</body>
</html>