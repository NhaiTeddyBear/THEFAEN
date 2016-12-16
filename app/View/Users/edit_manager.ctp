<div class="users form">
    <?php echo $this->Form->create('User'); ?>
        <legend><?php echo __('Edit Manager'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('fullname');
        echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('dob');
        echo $this->Form->input('phone_number');
        echo $this->Form->input('address');
        echo $this->Form->input('role', array('options' =>array('Manager'=>'manager', 'Staff'=>'staff')));
        ?>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'deleteStaff', $this->Form->value('User.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('User.id')))); ?></li>
        <li><?php echo $this->Html->link(__('List Users'), array('action' => 'indexOfManager')); ?></li>
    </ul>
</div>
