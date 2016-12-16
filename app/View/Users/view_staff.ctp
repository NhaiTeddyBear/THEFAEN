<div class="row">
	<h1 class="staff-manage">Xem thông tin nhân viên</h1>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Họ và tên'); ?></dt>
		<dd>
			<?php echo h($user['User']['fullname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tên đăng nhập'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ngày sinh'); ?></dt>
		<dd>
			<?php echo h($user['User']['dob']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Số điện thoại'); ?></dt>
		<dd>
			<?php echo h($user['User']['phone_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Địa chỉ'); ?></dt>
		<dd>
			<?php echo h($user['User']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vai trò'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ngày khởi tạo'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<div class="actions button-group">
			<button type="button" class="modify-button btn modify"><?php echo $this->Html->link(__('Sửa'), array('action' => 'editStaff', $user['User']['id'])); ?></button>
			<button type="button" class="delete-button btn delete"><?php echo $this->Form->postLink(__('Xóa'), array('action' => 'deleteStaff', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?></button>
			<button type="button" class="cancel-button btn cancel"><?php echo $this->Html->link(__('Hủy'), array('action' => 'listStaff')); ?></button>
		</div>

	</dl>
</div>
