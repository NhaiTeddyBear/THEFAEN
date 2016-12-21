<div class= "row">
	<h1 class="staff-manage">Xem bài viết</h1>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($post['Post']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tiêu đề'); ?></dt>
		<dd>
			<?php echo h($post['Post']['title']); ?>
			&nbsp;
		</dd>
		</dd>
		<dt><?php echo __('Mục'); ?></dt>
		<dd>
			<?php echo $this->Html->link($post['Category']['name'], array('controller' => 'categories', 'action' => 'view', $post['Category']['id'])); ?>
		</dd>
		<dt><?php echo __('Ảnh'); ?></dt>
		<dd>
			<img src="<?php echo $this->webroot.'post/'.$post['Post']['image']; ?>" class = "img-fluid" alt="Post"/>
		</dd>
		<dt><?php echo __('Nội dung'); ?></dt>
		<dd>
			<?php echo h($post['Post']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ngày khởi tạo'); ?></dt>
		<dd>
			<?php echo h($post['Post']['date_created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tác giả'); ?></dt>
		<dd>
			<?php echo $this->Html->link($post['User']['fullname'], array('controller' => 'users', 'action' => 'viewStaff', $post['User']['id'])); ?>
			&nbsp;
		</dd>
		<div class="actions button-group">
			<?php if($post['Post']['user_id'] == $_SESSION['Auth']['User']['id']){ ?>
			<button type="button" class="modify-button btn modify"><?php echo $this->Html->link(__('Sửa'), array('action' => 'edit', $post['Post']['id'])); ?></button>
			<button type="button" class="delete-button btn delete"><?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $post['Post']['id']), array('confirm' => __('Bạn có chắc muốn xóa # %s?', $post['Post']['id']))); ?></button>
			<?php } ?>
			<button type="button" class="cancel-button btn cancel"><?php echo $this->Html->link(__('Hủy'), array('action' => 'index')); ?></button>
		</div>
	</dl>
</div>

