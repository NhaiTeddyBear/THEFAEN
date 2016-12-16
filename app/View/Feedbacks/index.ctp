<div class="feedback index row">
	<h1 class="staff-manage">Danh sách phản hồi</h1>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
		<th>ID</th>
		<th>Người phản hồi</th>
		<th>Địa chỉ</th>
		<th>Email</th>
		<th>Số điện thoại</th>
		<th>Nội dung</th>
		<th>Ngày tạo</th>
		<th>Thao tác</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($feedback as $feedback): ?>
	<tr>
		<td><?php echo h($feedback['Feedback']['id']); ?>&nbsp;</td>
		<td><?php echo h($feedback['Feedback']['fullname']); ?>&nbsp;</td>
		<td><?php echo h($feedback['Feedback']['address']); ?>&nbsp;</td>
		<td><?php echo h($feedback['Feedback']['phone_number']); ?>&nbsp;</td>
		<td><?php echo h($feedback['Feedback']['email']); ?>&nbsp;</td>
		<td><?php echo h($feedback['Feedback']['content']); ?>&nbsp;</td>
		<td><?php echo h($feedback['Feedback']['date_created']); ?>&nbsp;</td>
		<td class="actions">
			<button type ="button" class="view-button btn"><?php echo $this->Html->link(__('Xem'), array('action' => 'view', $feedback['Feedback']['id'])); ?></button>
			<button type="button" class="delete-button btn"><?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $feedback['Feedback']['id']), array('confirm' => __('Bạn có chắc muốn xóa # %s?', $feedback['Feedback']['id']))); ?></button>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
		</table>
</div>
