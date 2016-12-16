<!-- File: /app/View/Posts/edit.ctp -->
<div class="row">
<h1 class="staff-manage">Sửa thông tin giao dịch</h1>

<!-- create form-->
<?php
echo $this->Form->create('Purchase',array(
    'class' => 'modify-form'
));
?>

<!-- ID-->
<?php
echo $this->Form->input('id', array(
    'label' => 'ID',
    'id' => 'id'
));
?>

<!-- name-->
<?php
echo $this->Form->input('food_id', array(
    'label' => 'Mặt Hàng',
    'id' => 'food_id'
));
?>

<!-- price-->
<?php
echo $this->Form->input('price', array(
    'label' => 'Giá',
    'id' => 'price'
));
?>

<!-- phone_number-->
<?php
echo $this->Form->input('phone_number', array(
    'label' => 'Số Điện Thoại',
    'id' => 'phone_number'
));
?>


<!-- membership_point-->
<?php
echo $this->Form->input('membership_point', array(
    'label' => 'Điểm Thành Viên',
    'id' => 'membership_point'
));
?>


<div class="button-group">

    <?php
    echo $this->Form->button('Lưu', array(
        'class' => 'modify-button btn modify'
    ));
    ?>

    <button type="button" class="cancel-button btn cancel">
        <?php
        echo $this->Html->link("Hủy", array('controller' => 'purchases', 'action' => 'indexOfStaff'));
        ?>
    </button>
</div>

</div>



<!--<div class="purchases form">-->
<!--    --><?php //echo $this->Form->create('Purchase'); ?>
<!--    <fieldset>-->
<!--        <legend>--><?php //echo __('Edit Purchase'); ?><!--</legend>-->
<!--        --><?php
//        echo $this->Form->input('id');
//        echo $this->Form->input('food_id');
//        echo $this->Form->input('price');
//        echo $this->Form->input('user_id');
//        echo $this->Form->input('phone_number');
//        echo $this->Form->input('membership_point');
//        echo $this->Form->input('date_created');
//        ?>
<!--    </fieldset>-->
<!--    --><?php //echo $this->Form->end(__('Submit')); ?>
<!--</div>-->
<!--<div class="actions">-->
<!--    <h3>--><?php //echo __('Actions'); ?><!--</h3>-->
<!--    <ul>-->
<!---->
<!--        <li>--><?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Purchase.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Purchase.id')))); ?><!--</li>-->
<!--        <li>--><?php //echo $this->Html->link(__('List Purchases'), array('action' => 'index')); ?><!--</li>-->
<!--        <li>--><?php //echo $this->Html->link(__('List Foods'), array('controller' => 'foods', 'action' => 'index')); ?><!-- </li>-->
<!--        <li>--><?php //echo $this->Html->link(__('New Food'), array('controller' => 'foods', 'action' => 'add')); ?><!-- </li>-->
<!--        <li>--><?php //echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?><!-- </li>-->
<!--        <li>--><?php //echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?><!-- </li>-->
<!--    </ul>-->
<!--</div>-->