<div class="monies index">
	<h2><?php echo __('Monies'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('schedule_id'); ?></th>
			<th><?php echo $this->Paginator->sort('aspect'); ?></th>
			<th><?php echo $this->Paginator->sort('amount'); ?></th>
			<th><?php echo $this->Paginator->sort('date_created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($monies as $money): ?>
	<tr>
		<td><?php echo h($money['Money']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($money['User']['fullname'], array('controller' => 'users', 'action' => 'view', $money['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($money['Schedule']['id'], array('controller' => 'schedules', 'action' => 'view', $money['Schedule']['id'])); ?>
		</td>
		<td><?php echo h($money['Money']['aspect']); ?>&nbsp;</td>
		<td><?php echo h($money['Money']['amount']); ?>&nbsp;</td>
		<td><?php echo h($money['Money']['date_created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $money['Money']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $money['Money']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $money['Money']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $money['Money']['id']))); ?>
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
		echo $this->Paginator->prev('« Trước ', null, null, array('class' => 'disabled')); //Shows the next and previous links
		echo " | ".$this->Paginator->numbers()." | "; //Shows the page numbers
		echo $this->Paginator->next(' Sau »', null, null, array('class' => 'disabled')); //Shows the next and previous links
		echo " Trang ".$this->Paginator->counter(); // prints X of Y, where X is current page and Y is number of pages
		?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Money'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schedules'), array('controller' => 'schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
