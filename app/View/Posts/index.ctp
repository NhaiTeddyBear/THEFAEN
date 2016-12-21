<div class="post row">

	<h1 class="staff-manage">Danh sách bài viết</h1>

	<table cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="9">

				<button type="button" class="view-button btn" style="float: left;">
					<?php echo $this->Html->link("Thêm bài viết mới", array('action' => 'add')); ?>
				</button>
			</td>
			<div class="notification">
				<h2>
					<?php
					echo $this->Flash->render('editPostSuccess');
					echo $this->Flash->render('editPostFailure');
					echo $this->Flash->render('addPostSuccess');
					echo $this->Flash->render('addPostFailure');
					echo $this->Flash->render('deletePostSuccess');
					echo $this->Flash->render('deletePostFailure');
					?>
				</h2>
			</div>
		</tr>
		<tr>
			<th>ID</th>
			<th>Tiêu đề</th>
			<th>Mục</th>
			<th>Nội dung</th>
			<th>Ngày khởi tạo</th>
			<th>Tác giả</th>
			<th>Thao tác</th>
		</tr>
		<?php foreach ($posts as $post): ?>
			<tr>
				<td><?php echo h($post['Post']['id']); ?>&nbsp;</td>
				<td><?php echo h($post['Post']['title']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($post['Category']['name'], array('controller' => 'categories', 'action' => 'view', $post['Category']['id'])); ?>
				</td>
				<td><?php echo h($post['Post']['body']); ?>&nbsp;</td>
				<td><?php echo h($post['Post']['date_created']); ?>&nbsp;</td>
				<td>
					<?php echo h($post['User']['fullname']); ?>
				</td>
				<td class="actions">
					<button type ="button" class="view-button btn"><?php echo $this->Html->link(__('Xem'), array('action' => 'view', $post['Post']['id'])); ?></button>
					<?php if($post['Post']['user_id'] == $_SESSION['Auth']['User']['id']){ ?>
						<button type="button" class="modify-button btn"><?php echo $this->Html->link(__('Sửa'), array('action' => 'edit', $post['Post']['id'])); ?></button>
						<button type="button" class="delete-button btn"><?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $post['Post']['id']), array('confirm' => __('Bạn có chắc muốn xóa bài viết # %s?', $post['Post']['id']))); ?></button>
					<?php } ?>
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
</div>

