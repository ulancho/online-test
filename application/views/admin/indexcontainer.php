<div class="container">
    <?php if ($this->session->flashdata ('success_message')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata ('success_message')?>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata ('flash_message')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata ('flash_message')?>
        </div>
    <?php endif; ?>
    <a href="<?= base_url() ?>admin/MainAdmin/addTest" class="btn btn-success">Добавить тест</a>
    <div class="row">
        <input type="hidden" value="<?=base_url()?>" id="url">
        <?php foreach ($profession as $row): ?>
            <div class="col-md-3">
                <div class="card-counter primary">
                    <span class="count-numbers"></span>
                    <span class="count-name"><?= $row['name'] ?></span>
                    <a href="<?= base_url() ?>admin/MainAdmin/all/<?= $row['id'] ?>"
                       title="Перейти на добавление и редактирование вопросов"><i class="glyphicon glyphicon-check"
                                                                                  alt="вопросы"></i></a>
                    <i title="Редактирование название профессии" class="glyphicon glyphicon-edit edit-profession" data-id="<?= $row['id'] ?>"
                       data-name="<?= $row['name'] ?>" data-toggle="modal" data-target="#editProf"></i>
                    <i title="Удаление профессии" class="glyphicon glyphicon-trash delete-profession" data-id="<?= $row['id'] ?>"
                       data-name="<?= $row['name'] ?>" data-toggle="modal" data-target="#deleteProf"></i>
                    <?php if ($row['status'] == 0): ?>
                        <label class="checkbox-inline stat"><input data-id="<?=$row['id']?>" class="stat" type="checkbox"  checked>Статус</label>
                    <?php elseif ($row['status'] == 1): ?>
                        <label class="checkbox-inline"><input data-id="<?=$row['id']?>" class="stat" type="checkbox">Статус</label>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Edit profession Modal -->
        <div class="modal fade" id="editProf" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Редактирование название профессии</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?=base_url()?>/admin/MainAdmin/updateProfession" method="post">
                            <div class="form-group">
                                <label for="name-prof">Название:</label>
                                <input type="text" class="form-control name-prof" name="name-prof" required>
                                <input type="hidden" class="id-prof" name="id-prof">
                            </div>
                            <input type="submit" class="btn btn-default" value="Изменить">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit profession Modal -->

        <!-- Delete profession Modal -->
        <div class="modal fade" id="deleteProf" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Редактирование название профессии</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?=base_url()?>/admin/MainAdmin/deleteProfession" method="post">
                            <div class="form-group">
                                <label for="">Профессия: <input style="width: 500px;border: none;color: rgba(0,0,0,0.64);" type="text" class="name-prof" readonly></label>
                                <h4><strong>Вы уверены что хотите удалить профессию?</strong></h4>
                                <input type="hidden" class="id-prof" name="id-prof">
                            </div>
                            <input type="submit" class="btn btn-default" value="Да,удалить">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Delete profession Modal -->
    </div>