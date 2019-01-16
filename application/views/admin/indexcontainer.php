<div class="container">
    <a href="<?=base_url()?>admin/MainAdmin/addTest" class="btn btn-success">Добавить тест</a>
    <div class="row">
        <?php foreach ($profession as $row):?>
        <a href="<?=base_url()?>admin/MainAdmin/all/<?=$row['id']?>">
        <div class="col-md-3">
            <div class="card-counter primary">
                <span class="count-numbers"></span>
                <span class="count-name"><?=$row['name']?></span>
            </div>
        </div>
        </a>
        <?php endforeach;?>
</div>