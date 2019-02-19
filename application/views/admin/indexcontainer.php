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
                    <i title="Добавление результата" class="glyphicon glyphicon-education add-result" data-id="<?= $row['id'] ?>"
                       data-name="<?= $row['name'] ?>" data-toggle="modal" data-target="#addResult"></i>
                    <?php if ($row['status'] == 0): ?>
                        <label class="checkbox-inline"><input data-id="<?=$row['id']?>" class="stat" type="checkbox"  checked>Статус</label>
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

        <!-- Add profession result Modal -->
        <div class="modal fade" id="addResult" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Добавление результата</h4>
                    </div>
                    <div class="modal-body">
                        <h3 class="profession-name"></h3>
                        <form action="javascript:void(0)" id="formAddResult">
                            <h4>1)До 20 баллов</h4>
                            <div class="form-group">
                                <input type="hidden" name="id" class="id-prof">
                                <label for="">Главный текст:</label>
                                <input type="text" id="main20" class="form-control" name="main-result-20" required>
                            </div>
                            <div class="form-group">
                                <label for="">Дополнительный текст:</label>
                                <textarea id="dop20" class="form-control" rows="5" name="dop-result-20" required></textarea>
                            </div>
                            <hr>
                            <h4>1)До 50 баллов</h4>
                            <div class="form-group">
                                <label for="">Главный текст:</label>
                                <input id="main50" type="text" class="form-control" name="main-result-50" required>
                            </div>
                            <div class="form-group">
                                <label for="">Дополнительный текст:</label>
                                <textarea id="dop50" class="form-control" rows="5" name="dop-result-50" required></textarea>
                            </div>
                            <hr>
                            <h4>1)До 90 баллов</h4>
                            <div class="form-group">
                                <label for="">Главный текст:</label>
                                <input id="main90" type="text" class="form-control" name="main-result-90" required>
                            </div>
                            <div class="form-group">
                                <label for="">Дополнительный текст:</label>
                                <textarea id="dop90" class="form-control" rows="5" name="dop-result-90" required></textarea>
                            </div>
                            <hr>
                            <input type="submit" class="btn btn-default" value="Изменить">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
        <!--  Add profession result Modal -->
    </div>
    <div class="modalLoad"></div>