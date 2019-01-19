<div class="container">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin/Admin_page/admin"><i class="fa fa-dashboard"></i>Тест</a></li>
            <li><a href="#"><?=$prof[0]->name?></a></li>
        </ol>
        <br/>
    </section>
    <div class="well well-sm">
        <div class="row">
            <div class="pull-right">
                <a href="<?=base_url()?>admin/MainAdmin/addQuestions/<?=$prof[0]->table_name?>">
                    <button class="btn  btn-success">
                        <i class="fa fa-fw fa-plus"></i>
                        Добавить
                    </button>
                </a>
            </div>
        </div>
    </div>
    <table class="table table-hover table-bordered table-striped">
        <tr>
            <th>
                №
            </th>
            <th>
                Вопрос
            </th>
            <th colspan="2">
                Редактирование
            </th>
        </tr>
        <?php
        $i=1;
        foreach($questions as $row)
        {
            echo '<tr>';
            echo '<td>'.$i++.'</td>';
            echo '<td>'.$row['question'].'</td>';
            echo '<td><a href="'.site_url().'admin/MainSections/updateNews/'.$row['id'].'"><button type="button" class="btn btn-primary">Редактировать</button></a></td>';
            echo '<td><a href="'.site_url().'admin/MainAdmin/deleteQuestion/'.$row['id'].'"><button type="button" class="btn btn-danger">Удалить</button></a></td>';
            echo '</tr>';
        }
        ?>
    </table>
    <?php
    echo $this->pagination->create_links();
    ?>
</div>