<div class="feedback form row">
	<h1 class="staff-manage">Đóng góp ý kiến với chúng tôi</h1>
	<?php echo $this->Form->create('Feedback', array('class'=>'modify-form')); ?>
	<?php
		echo $this->Form->input('fullname', array('label'=>'Họ và tên'));
		echo $this->Form->input('address', array('label'=>'Địa chỉ'));
		echo $this->Form->input('phone_number', array('label'=>'Số điện thoại'));
		echo $this->Form->input('email', array('label'=>'Email'));
		echo $this->Form->input('content', array('label'=>'Nội dung'));
	?>
	<div class="button-group">
		<button type="submit" class="view-button btn view submit">Lưu</button>
		<button type="button" class="cancel-button btn cancel"><?php echo $this->Html->link(__('Hủy'), array('controller'=>'users','action' => 'home')); ?></button>
	</div>
</div>
