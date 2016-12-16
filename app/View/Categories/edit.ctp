<div class="categories form row">
	<h1 class="staff-manage">Chỉnh sửa các mục</h1>
<?php echo $this->Form->create('Category', array('class'=>'modify-form')); ?>
	<?php
		echo $this->Form->input('id', array('label'=>'ID'));
		echo $this->Form->input('name', array('label'=>'Tên mục'));
	?>
	<div class="button-group">
		<button type="submit" class="view-button btn view submit">Lưu</button>
		<button type="button" class="cancel-button btn cancel"><?php echo $this->Html->link(__('Hủy'), array('action' => 'index')); ?></button>
	</div>
</div>
