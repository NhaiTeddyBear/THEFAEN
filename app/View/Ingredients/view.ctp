<div class="row">
	<h1 class="staff-manage">Xem nguyên liệu</h1>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cost'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['cost']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Bought'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['date_bought']); ?>
			&nbsp;
		</dd>
		<div class="actions button-group">
			<button type="button" class="modify-button btn modify"><?php echo $this->Html->link(__('Sửa'), array('action' => 'edit', $ingredient['Ingredient']['id'])); ?></button>
			<button type="button" class="delete-button btn delete"><?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $ingredient['Ingredient']['id']), array('confirm' => __('Bạn có chắc muốn xóa # %s?', $ingredient['Ingredient']['id']))); ?></button>
			<button type="button" class="cancel-button btn cancel"><?php echo $this->Html->link(__('Hủy'), array('action' => 'index')); ?></button>
		</div>
	</dl>
</div>
