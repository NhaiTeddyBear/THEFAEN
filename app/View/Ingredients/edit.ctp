<div class="ingredients form row">
	<h1 class="staff-manage">Sửa nguyên liệu</h1>
<?php echo $this->Form->create('Ingredient', array('class'=>'modify-form')); ?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('label'=>'Tên nguyên liệu'));
		echo $this->Form->input('quantity', array('label'=>'Số lượng'));
		echo $this->Form->input('cost', array('label'=>'Đơn giá'));
		echo $this->Form->input('date_bought', array('label'=>'Ngày nhập'));
	?>
	<div class="button-group">
		<button type="submit" class="view-button btn view submit">Lưu</button>
		<button type="button" class="cancel-button btn cancel"><?php echo $this->Html->link(__('Hủy'), array('action' => 'index')); ?></button>
	</div>
</div>

