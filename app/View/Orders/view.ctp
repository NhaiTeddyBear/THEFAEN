<div class="row">
	<h1 class="staff-manage">Xem thông tin đơn hàng</h1>

	<dl>
		<dt>ID</dt>
		<dd>
			<?php echo h($order['Order']['id']); ?>
		</dd>

		<dt>Tên món</dt>
		<dd>
			<?php echo h($order['Food']['name']); ?>
		</dd>

		<dt>Số lượng</dt>
		<dd>
			<?php echo h($order['Order']['quantity']); ?>
		</dd>

		<dt>Khách hàng</dt>
		<dd>
			<?php echo h($order['User']['fullname']); ?>
		</dd>

		<dt>Số điện thoại</dt>
		<dd>
			<?php echo h($order['User']['phone_number']); ?>
		</dd>

		<dt>Thành tiền</dt>
		<dd>
			<?php echo h($order['Order']['total']); ?>
		</dd>

		<dt>Địa chỉ</dt>
		<dd>
			<?php echo h($order['Order']['detail']); ?>
		</dd>

		<div class="button-group">

			<button type="button" class="view-button btn view">
				<?php
				echo $this->Form->postLink(
					'Xóa',
					array('action' => 'delete', $order['Order']['id']),
					array('confirm' => 'Bạn có muốn xóa dữ liệu này không?')
				);
				?>
			</button>


			<button type="button" class="modify-button btn modify">
				<?php echo $this->Html->link(
					'Sửa',
					array('controller' => 'orders', 'action' => 'edit',$order['Order']['id'])
				); ?>
			</button>

			<button type="button" class="cancel-button btn cancel">
				<?php echo $this->Html->link(
					'Hủy',
					array('controller' => 'orders', 'action' => 'indexOfStaff')
				); ?>
			</button>

		</div>
	</dl>


</div>