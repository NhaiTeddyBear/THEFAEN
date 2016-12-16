<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Staff'), array('action' => 'indexOfManager')); ?> </li>
    </ul>
<!--    --><?php //if($_SESSION['Auth']['User']['id'] ='7') { ?>
<!--        <li>--><?php //echo $this->Html->link(__('New Manager'), array('action' => 'addManager')); ?><!-- </li>-->
<!--    --><?php //} ?>
</div>
<div class="users index">
    <h2><?php echo __('Managers'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('fullname'); ?></th>
            <th><?php echo $this->Paginator->sort('username'); ?></th>
            <th><?php echo $this->Paginator->sort('dob'); ?></th>
            <th><?php echo $this->Paginator->sort('phone_number'); ?></th>
            <th><?php echo $this->Paginator->sort('address'); ?></th>
            <th><?php echo $this->Paginator->sort('role'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
                <td><?php echo $this->Html->link($user['User']['fullname'], array('action'=>'viewMember', $user['User']['id'])); ?>&nbsp;</td>
                <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['dob']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['phone_number']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['address']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['created']); ?>&nbsp;</td>



                </td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'viewManager', $user['User']['id'])); ?>
               <?php if($_SESSION['Auth']['User']['id'] ='7') { ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'editManager', $user['User']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'deleteManager', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?>
                <?php } ?>
                </td>
            </tr>
        <?php endforeach; ?>
</div>
