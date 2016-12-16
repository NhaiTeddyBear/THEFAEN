<div class="row">
	<h1 class="staff-manage">Thông tin lịch làm việc</h1>

	<dl>
		<dt>ID</dt>
		<dd>
			<?php echo h($schedule['Schedule']['id']); ?>
		</dd>

		<dt>Tên Nhân Viên</dt>
		<dd>
			<?php echo h($schedule['User']['fullname']); ?>
		</dd>

		<dt>Ngày</dt>
		<dd>
			<?php echo h($schedule['Schedule']['date']); ?>
		</dd>

		<dt>Ca làm việc</dt>
		<dd>
			<?php echo h($schedule['Schedule']['shift']); ?>
		</dd>

		<dt>Tổng số ca</dt>
		<dd>
			<?php echo h($schedule['Schedule']['count']); ?>
		</dd>

		<div class="button-group">

			<button type="button" class="view-button btn view">
				<?php
				echo $this->Form->postLink(
					'Xóa',
					array('action' => 'delete', $schedule['Schedule']['id']),
					array('confirm' => 'Bạn có muốn xóa dữ liệu này không?')
				);
				?>
			</button>


			<button type="button" class="modify-button btn modify">
				<?php echo $this->Html->link(
					'Sửa',
					array('controller' => 'schedules', 'action' => 'edit',$schedule['Schedule']['id'])
				); ?>
			</button>

			<button type="button" class="cancel-button btn cancel">
				<?php echo $this->Html->link(
					'Hủy',
					array('controller' => 'schedules', 'action' => 'indexOfManager')
				); ?>
			</button>

		</div>
	</dl>