<div class="ingredients index row">
	<h1 class="staff-manage">Danh sách nguyên liệu</h1>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="9">

				<button type="button" class="view-button btn" style="float: left;">
					<?php echo $this->Html->link("Thêm nguyên liệu mới", array('action' => 'add')); ?>
				</button>
			</td>
			<div class="notification">
				<h2>
					<?php
					echo $this->Flash->render('editIngredientSuccess');
					echo $this->Flash->render('editIngredientFailure');
					echo $this->Flash->render('addIngredientSuccess');
					echo $this->Flash->render('addIngredientFailure');
					echo $this->Flash->render('deleteIngredientSuccess');
					echo $this->Flash->render('deleteIngredientFailure');
					?>
				</h2>
			</div>
		</tr>
	<tr>
		<th>ID</th>
		<th>Tên nguyên liệu</th>
		<th>Số lượng</th>
		<th>Đơn giá</th>
		<th>Ngày nhập</th>
		<th></th>
	</tr>
	<tbody>
	<?php foreach ($ingredients as $ingredient): ?>
	<tr>
		<td><?php echo h($ingredient['Ingredient']['id']); ?>&nbsp;</td>
		<td><?php echo h($ingredient['Ingredient']['name']); ?>&nbsp;</td>
		<td><?php echo h($ingredient['Ingredient']['quantity']); ?>&nbsp;</td>
		<td><?php echo h($ingredient['Ingredient']['cost']); ?>&nbsp;</td>
		<td><?php echo h($ingredient['Ingredient']['date_bought']); ?>&nbsp;</td>
		<td class="actions">
			<button type ="button" class="view-button btn"><?php echo $this->Html->link(__('Xem'), array('action' => 'view', $ingredient['Ingredient']['id'])); ?></button>
			<button type="button" class="modify-button btn"><?php echo $this->Html->link(__('Sửa'), array('action' => 'edit', $ingredient['Ingredient']['id'])); ?></button>
			<button type="button" class="delete-button btn"><?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $ingredient['Ingredient']['id']), array('confirm' => __('Bạn có chắc muốn xóa # %s?', $ingredient['Ingredient']['id']))); ?></button>
		</td>
	</tr>
<?php endforeach; ?>
		<tfoot>
		<tr>
			<td colspan="7">
				<?php
				echo $this->Paginator->prev('« Trước ', null, null, array('class' => 'disabled')); //Shows the next and previous links
				echo " | ".$this->Paginator->numbers()." | "; //Shows the page numbers
				echo $this->Paginator->next(' Sau »', null, null, array('class' => 'disabled')); //Shows the next and previous links
				echo " Trang ".$this->Paginator->counter(); // prints X of Y, where X is current page and Y is number of pages
				?>
			</td>
		</tr>
		</tfoot>
	</table>