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
			<?php
				if($user['User']['role']== "Staff"){
					echo "Nhân viên";
				}
				if ($user['User']['role']== "Manager"){
					echo "Quản lý";
				}
				if ($user['User']['role']== "Member"){
					echo "Thành viên";
				}
			?>
		</dd>
		<dt><?php echo __('Ngày khởi tạo'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ảnh đại diện'); ?></dt>
		<dd>
			<img src="<?php echo $this->webroot.'avatar/'.$user['User']['avatar']; ?>" width="100" height="100"/>
		</dd>
		<div class="actions button-group">
			<button type="button" class="modify-button btn modify"><?php echo $this->Html->link(__('Sửa'), array('action' => 'editStaff', $user['User']['id'])); ?></button>
			<button type="button" class="delete-button btn delete"><?php echo $this->Form->postLink(__('Xóa'), array('action' => 'deleteStaff', $user['User']['id']), array('confirm' => __('Bạn có muốn xóa dữ liệu # %s?', $user['User']['id']))); ?></button>
			<button type="button" class="cancel-button btn cancel"><?php echo $this->Html->link(__('Hủy'), array('action' => 'listStaff')); ?></button>
		</div>

	</dl>
</div>
