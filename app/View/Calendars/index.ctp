<div class="row">
	<h1 class="staff-manage">Thực đơn trong tuần</h1>
	<button type="button" class="view-button btn view">
		<?php echo $this->Html->link("Thêm Thực Đơn", array('action' => 'add')); ?></p>
	</button>

	<table cellpadding="0" cellspacing="0">
<!--	<thead>-->
<!--	<tr>-->
<!--			<th>--><?php //echo $this->Paginator->sort('id'); ?><!--</th>-->
<!--			<th>--><?php //echo $this->Paginator->sort('date'); ?><!--</th>-->
<!--			<th>--><?php //echo $this->Paginator->sort('food_id'); ?><!--</th>-->
<!--			<th class="actions">--><?php //echo __('Actions'); ?><!--</th>-->
<!--	</tr>-->
<!--	</thead>-->
	<tbody>
	<tr>
		<th>ID</th>
		<th>Ngày</th>
		<th>Tên món ăn</th>
		<th>Ảnh</th>
		<th>Giá</th>
		<th>Thao tác</th>
	</tr>

	<?php foreach ($calendars as $calendar): ?>
	<tr>
		<td><?php echo h($calendar['Calendar']['id']); ?>&nbsp;</td>
		<td><?php echo h($calendar['Calendar']['date']); ?>&nbsp;</td>
		<td>
			<?php echo h($calendar['Food']['name']); ?>
		</td>
		<!-- display image -->
		<td>
			<img src="<?php echo $this->webroot.'upload/'.$calendar['Food']['image']; ?>" width="100" height="100"/>
		</td>
		<!-- price -->
		<td>
			<?php echo h($calendar['Food']['price']); ?>
		</td>

		<!-- display action -->
		<td>

			<button type="button" class="view-button btn">
				<?php
				echo $this->Html->link(
					'Xem', array('action' => 'view', $calendar['Calendar']['id'])
				);
				?>
			</button>

			<button type="button" class="modify-button btn">
				<?php
				echo $this->Html->link(
					'Sửa', array('action' => 'edit', $calendar['Calendar']['id'])
				);
				?>
			</button>

			<button type="button" class="delete-button btn">
				<?php
				echo $this->Form->postLink(
					'Xóa',
					array('action' => 'delete', $calendar['Calendar']['id']),
					array('confirm' => 'Bạn có muốn xóa dữ liệu này không?')
				);
				?>
			</button>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
