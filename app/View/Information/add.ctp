<div class="row">
    <h1 class="staff-manage">Thêm thông tin quán</h1>
    <?php echo $this->Form->create('Information', array('class'=>'modify-form')); ?>
    <?php
    echo $this->Form->input('content', array('label'=>'Nội dung'));
    ?>
    <div class="button-group">
        <button type="submit" class="view-button btn view submit">Lưu</button>
    </div>
</div>