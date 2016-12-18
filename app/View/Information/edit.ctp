<div class=" row">
    <h1 class="staff-manage">Chỉnh sửa thông tin quán</h1>
    <?php echo $this->Form->create('Information', array('class'=>'modify-form')); ?>
    <?php
    echo $this->Form->input('id', array('label'=>'ID'));
    echo $this->Form->input('content', array('label'=>'Nội dung'));
    ?>
    <div class="button-group">
        <button type="submit" class="view-button btn view submit">Lưu</button>
        <button type="button" class="cancel-button btn cancel"><?php echo $this->Html->link(__('Hủy'), array('action' => 'view')); ?></button>
    </div>
</div>
