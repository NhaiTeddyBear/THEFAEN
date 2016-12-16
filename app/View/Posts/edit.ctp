<div class="row">
	<h1 class="staff-manage">Sửa bài viết</h1>
	<?php echo $this->Form->create('Post', array('class'=>'modify-form')); ?>
		<?php
		echo $this->Form->input('id', array('label'=>'ID'));
		echo $this->Form->input('title', array('label'=>'Tiêu đề'));
		echo $this->Form->input('category_id', array('label'=>'Mục'));
		echo $this->Form->input('body', array('Nội dung'));
		?>
	<div class="button-group">
		<button type="submit" class="view-button btn view submit">Lưu</button>
		<button type="button" class="cancel-button btn cancel"><?php echo $this->Html->link(__('Hủy'), array('action' => 'index')); ?></button>
	</div>
</div>
