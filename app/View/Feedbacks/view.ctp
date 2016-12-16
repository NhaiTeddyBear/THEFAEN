<div class="feedback view row">
	<h1 class="staff-manage">Danh sách phản hồi</h1>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Người phản hồi'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['fullname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Địa chỉ'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Số điện thoại'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['phone_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nội dung'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ngày tạo'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['date_created']); ?>
			&nbsp;
		</dd>
		<div class="actions button-group">
			<button type="button" class="delete-button btn delete"><?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $feedback['Feedback']['id']), array('confirm' => __('Bạn có chắc muốn xóa # %s?', $feedback['Feedback']['id']))); ?></button>
			<button type="button" class="cancel-button btn cancel"><?php echo $this->Html->link(__('Hủy'), array('action' => 'index')); ?></button>
		</div>
	</dl>
</div>
