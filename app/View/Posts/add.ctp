<div class="posts form row">
	<h1 class="staff-manage">Thêm bài viết</h1>
	<?php echo $this->Form->create('Post', array('class'=>'modify-form')); ?>

		<?php
		echo $this->Form->input('title', array('label'=>'Tiêu đề'));
		echo $this->Form->input('category_id', array('label'=>'Mục'));
		echo $this->Form->input('date_created', array('label'=>'Ngày tạo'));
		echo $this->Form->input('body', array('label'=>'Nội dung'));
		?>
	<div class="button-group">
		<button type="submit" class="view-button btn view submit">Lưu</button>
		<button type="button" class="cancel-button btn cancel"><?php echo $this->Html->link(__('Hủy'), array('action' => 'index')); ?></button>
	</div>
</div>