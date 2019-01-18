<div class="col-lg-8 col-lg-offset-2">
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
        <strong><center>Добваление вопроса и ответов</center></strong>
    <a href="<?=base_url()?>admin/MainSections/all/<?=$allid?>" class="text-primary">ПЕРЕЙТИ К ПРОСМОТРУ</a>
    <h4>Пожалуйста, введите необходимую информацию ниже</h4>
    <form action="<?=base_url()?>admin/MainAdmin/addQuest" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="usr">Вопрос:</label>
        <input name="questions" type="text" class="form-control" id="" required>
        <input name="questions_file" type="file" class="form-control">
        <input name="table" type="text" value="<?=$table_name?>">
    </div>
        <div class="form-group">
            <label class="checkbox-inline"><input name="img-status" onchange="fileNone(this)" type="checkbox" value="1">фото-ответ</label>
        </div>
        <div class="form-group row">
            <div class="col-sm-8 str">
                <label for="usr">Ответ №1:</label>
                <input readonly="readonly" type="text" class="form-control" id="usr">
            </div>
            <div class="col-sm-2 str">
                <br>
                <label class="checkbox-inline">
                    <input data-code_answer="1" onchange="checkboxQ(this)" type="checkbox" value="">
                </label>
            </div>
            <div class="col-sm-8 file">
                <br>
                    <input type="file" class="form-control" disabled>
            </div>
            <div class="col-sm-2 file">
                <br>
                <label class="checkbox-inline">
                    <input data-code_answer="1" onchange="checkboxFile(this)" type="checkbox" value="">
                </label>
            </div>
        </div>
            <div class="form-group row">
                <div class="col-sm-8 str">
                    <label for="usr">Ответ №2:</label>
                    <input readonly="readonly" type="text" class="form-control" id="usr">
                </div>
                <div class="col-sm-2 str">
                    <br>
                    <label class="checkbox-inline">
                        <input data-code_answer="2" onchange="checkboxQ(this)" type="checkbox" value="">
                    </label>
                </div>
                <div class="col-sm-8 file">
                    <br>
                        <input type="file" class="form-control" disabled>
                </div>
                <div class="col-sm-2 file">
                    <br>
                    <label class="checkbox-inline">
                        <input data-code_answer="2" onchange="checkboxFile(this)" type="checkbox" value="">
                    </label>
                </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8 str">
                        <label for="usr">Ответ №3:</label>
                        <input readonly="readonly" type="text" class="form-control" id="usr">
                    </div>
                    <div class="col-sm-2 str">
                        <br>
                        <label class="checkbox-inline">
                            <input data-code_answer="3" onchange="checkboxQ(this)" type="checkbox" value="">
                        </label>
                    </div>
                    <div class="col-sm-8 file">
                        <br>
                            <input type="file" class="form-control" disabled>
                    </div>
                    <div class="col-sm-2 file">
                        <br>
                        <label class="checkbox-inline">
                            <input data-code_answer="3" onchange="checkboxFile(this)" type="checkbox" value="">
                        </label>
                    </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8 str">
                            <label for="usr">Ответ №4:</label>
                            <input readonly="readonly" type="text" class="form-control" id="usr">
                        </div>
                        <div class="col-sm-2 str">
                            <br>
                            <label class="checkbox-inline">
                                <input data-code_answer="4" onchange="checkboxQ(this)" type="checkbox" value="">
                            </label>
                        </div>
                        <div class="col-sm-8 file">
                            <br>
                                <input type="file" class="form-control" disabled>
                        </div>
                        <div class="col-sm-2 file">
                            <br>
                            <label class="checkbox-inline">
                                <input data-code_answer="4" onchange="checkboxFile(this)" type="checkbox" value="">
                            </label>
                        </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 str">
                                <label for="usr">Ответ №5:</label>
                                <input readonly="readonly" type="text" class="form-control" id="usr">
                            </div>
                            <div class="col-sm-2 str">
                                <br>
                                <label class="checkbox-inline">
                                    <input data-code_answer="5" onchange="checkboxQ(this)" type="checkbox" value="">
                                </label>
                            </div>
                            <div class="col-sm-8 file">
                                <br>
                                    <input  type="file" class="form-control" disabled>
                            </div>
                            <div class="col-sm-2 file">
                                <br>
                                <label class="checkbox-inline">
                                    <input data-code_answer="5" onchange="checkboxFile(this)" type="checkbox" value="">
                                </label>
                            </div>
                            </div>
        <div class="form-group">
            <label for="">Выберите правильный ответ</label> <br>
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
        <input type="submit" class="btn btn-primary" value="добавить">
    </form>
</div>
