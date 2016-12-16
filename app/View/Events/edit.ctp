<div class="row">
<!-- File: /app/View/Events/edit.ctp -->

<h1 class="staff-manage">Sửa thông tin sự kiện</h1>

<!-- create form-->
<?php
echo $this->Form->create('Event',array(
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
echo $this->Form->input('name', array(
    'label' => 'Tên',
    'id' => 'name'
));
?>

<!-- body-->
<?php
echo $this->Form->input('body', array(
    'label' => 'Nội dung',
    'id' => 'body'
));
?>

<!-- started_date-->
<?php
echo $this->Form->input('started_date', array(
    'label' => 'Ngày bắt đầu',
    'id' => 'started_date'
));
?>

<!-- end_date-->
<?php
echo $this->Form->input('end_date', array(
    'label' => 'Ngày kết thúc',
    'id' => 'end_date'
));
?>



<div class="button-group">
    <!--        <button type="button" class="modify-button btn modify">-->
    <?php
    echo $this->Form->button('Lưu', array(
        'class' => 'modify-button btn modify'
    ));
    ?>
    <!--        </button>-->
    <button type="button" class="cancel-button btn cancel">
        <?php
        echo $this->Html->link("Hủy", array('controller' => 'events', 'action' => 'index'));
        ?>
    </button>
</div>


</div>