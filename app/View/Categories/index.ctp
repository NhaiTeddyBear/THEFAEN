<div class="categories index row">
	<h1 class="staff-manage">Danh sách các mục</h1>
	<div class="notification">
		<h2>
			<?php
			echo $this->Flash->render('editCategorySuccess');
			echo $this->Flash->render('editCategoryFailure');
			echo $this->Flash->render('addCategorySuccess');
			echo $this->Flash->render('addCategoryFailure');
			echo $this->Flash->render('deleteCategorySuccess');
			echo $this->Flash->render('deleteCategoryFailure');
			?>
		</h2>
	</div>
	<table>
		<td colspan="9">

			<button type="button" class="view-button btn" style="float: left;">
				<?php echo $this->Html->link("Thêm Mục", array('action' => 'add')); ?>
			</button>

		</td>
	<tr>
		<th>ID</th>
		<th>Tên mục</th>
		<th>Thao tác</th>
	</tr>
	<?php foreach ($categories as $category): ?>
	<tr>
		<td><?php echo h($category['Category']['id']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['name']); ?>&nbsp;</td>
		<td class="actions">
			<button type ="button" class="view-button btn"><?php echo $this->Html->link(__('Xem'), array('action' => 'view', $category['Category']['id'])); ?></button>
			<button type="button" class="modify-button btn"><?php echo $this->Html->link(__('Sửa'), array('action' => 'edit', $category['Category']['id'])); ?></button>
			<button type="button" class="delete-button btn"><?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $category['Category']['id']), array('confirm' => __('Bạn có chắc muốn xóa # %s?', $category['Category']['id']))); ?></button>
		</td>
	</tr>
<?php endforeach; ?>
		<tfoot>
		<tr>
			<td colspan="3">
				<?php
				echo $this->Paginator->prev('« Previous ', null, null, array('class' => 'disabled')); //Shows the next and previous links
				echo " | ".$this->Paginator->numbers()." | "; //Shows the page numbers
				echo $this->Paginator->next(' Next »', null, null, array('class' => 'disabled')); //Shows the next and previous links
				echo " Page ".$this->Paginator->counter(); // prints X of Y, where X is current page and Y is number of pages
				?>
			</td>
		</tr>
		</tfoot>
	</table>

</div>
