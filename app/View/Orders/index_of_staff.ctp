<?php  $paginator = $this->Paginator; ?>
<div class="row">

	<h1 class="staff-manage">Đặt hàng</h1>

	<div class="notification">
		<h2>
			<?php
			echo $this->Flash->render('editOrderSuccess');
			echo $this->Flash->render('editOrderFailure');
			echo $this->Flash->render('addOrderSuccess');
			echo $this->Flash->render('addOrderFailure');
			echo $this->Flash->render('deleteOrderSuccess');
			echo $this->Flash->render('deleteOrderFailure');
			?>
		</h2>
	</div>
	<table>
		<td colspan="6">

			<button type="button" class="view-button btn" style="float: left;">
				<?php echo $this->Html->link("Thêm đơn đặt hàng", array('action' => 'addOfStaff')); ?>
			</button>

		</td>

		<tr>
			<th>ID</th>
			<th>Tên món</th>
			<th>Số lượng</th>
			<th>Khách hàng</th>
			<th>Thành tiền</th>
			<th>Địa chỉ</th>
			<th>Ngày</th>
			<th>Thao Tác</th>
		</tr>

		<tfoot>
		<tr>
			<td colspan="8">
				<?php
				echo $this->Paginator->prev('« Previous ', null, null, array('class' => 'disabled')); //Shows the next and previous links
				echo " | ".$this->Paginator->numbers()." | "; //Shows the page numbers
				echo $this->Paginator->next(' Next »', null, null, array('class' => 'disabled')); //Shows the next and previous links
				echo " Page ".$this->Paginator->counter(); // prints X of Y, where X is current page and Y is number of pages
				?>
			</td>
		</tr>
		</tfoot>

		<?php foreach ($orders as $order): ?>
		<tr>
			<!-- display id -->
			<td><?php echo $order['Order']['id']; ?></td>

			<!-- display name -->
			<td><?php echo $order['Food']['name']; ?></td>

			<!-- display quantity -->
			<td><?php echo $order['Order']['quantity']; ?></td>

			<!-- display user -->
			<td><?php echo $order['User']['fullname']; ?></td>

			<!-- display total -->
			<td><?php echo $order['Order']['total']; ?></td>

			<!-- display detail -->
			<td><?php echo $order['Order']['detail']; ?></td>

			<!-- display date_created -->
			<td><?php echo $order['Order']['date_created']; ?></td>

			<!-- display action -->
			<td>

				<button type="button" class="view-button btn">
					<?php
					echo $this->Html->link(
						'Xem', array('action' => 'view', $order['Order']['id'])
					);
					?>
				</button>

				<button type="button" class="modify-button btn">
					<?php
					echo $this->Html->link(
						'Sửa', array('action' => 'edit', $order['Order']['id'])
					);
					?>
				</button>

				<button type="button" class="delete-button btn">
					<?php
					echo $this->Form->postLink(
						'Xóa',
						array('action' => 'delete', $order['Order']['id']),
						array('confirm' => 'Bạn có muốn xóa dữ liệu này không?')
					);
					?>
				</button>
			</td>

		</tr>
		<?php endforeach; ?>

	</table>
</div>