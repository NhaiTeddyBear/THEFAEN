<div class="categories view row">
	<h1 class="staff-manage">Xem thông tin mục</h1>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name', array('label'=>'Tên mục')); ?></dt>
		<dd>
			<?php echo h($category['Category']['name']); ?>
			&nbsp;
		</dd>
	</dl>
	<div class="actions button-group">
		<button type="button" class="modify-button btn modify"><?php echo $this->Html->link(__('Sửa'), array('action' => 'edit', $category['Category']['id'])); ?></button>
		<button type="button" class="delete-button btn delete"><?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $category['Category']['id']), array('confirm' => __('Bạn có chắc muốn xóa # %s?', $category['Category']['id']))); ?></button>
		<button type="button" class="cancel-button btn cancel"><?php echo $this->Html->link(__('Hủy'), array('action' => 'index')); ?></button>
	</div>
</div>

