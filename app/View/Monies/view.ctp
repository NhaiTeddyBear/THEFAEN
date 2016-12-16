<div class="monies view">
<h2><?php echo __('Money'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($money['Money']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($money['User']['fullname'], array('controller' => 'users', 'action' => 'view', $money['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Schedule'); ?></dt>
		<dd>
			<?php echo $this->Html->link($money['Schedule']['id'], array('controller' => 'schedules', 'action' => 'view', $money['Schedule']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aspect'); ?></dt>
		<dd>
			<?php echo h($money['Money']['aspect']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($money['Money']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Created'); ?></dt>
		<dd>
			<?php echo h($money['Money']['date_created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Money'), array('action' => 'edit', $money['Money']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Money'), array('action' => 'delete', $money['Money']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $money['Money']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Monies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Money'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schedules'), array('controller' => 'schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
