<div class="col-lg-4 col-lg-offset-4">
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
        <strong><center>Добваление теста</center></strong>
    <a href="<?=base_url()?>admin/Admin_page/admin" class="text-primary">ПЕРЕЙТИ К ПРОСМОТРУ</a>
    <h4>Пожалуйста, введите необходимую информацию ниже</h4>
    <?php
    $fattr = array('class' => 'form-signin');
    echo form_open_multipart("admin/MainAdmin/addTest", $fattr);
    ?>
    <div class="form-group">
        <label for="">Введите название теста.</label>
        <?php echo form_input(array('name'=>'name', 'id'=> 'name', 'placeholder'=>'Название', 'class'=>'form-control', 'value' => set_value('firstname'))); ?>
        <?php echo form_error('name');?>
    </div>
    <div class="form-group">
        <label for="">Введите название на латинице.Не больше одного слова: Пример: design</label>
        <?php echo form_input(array('name'=>'table_name', 'id'=> 'table_name', 'placeholder'=>'table name', 'class'=>'form-control', 'value'=> set_value('lastname'))); ?>
        <?php echo form_error('table_name');?>
    </div>
    <?php echo form_submit(array('value'=>'Добавить', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
    <?php echo form_close(); ?>
</div>