<!-- File: /app/View/Event/add.ctp -->
<div class="row">

<h1 class="staff-manage">Thêm chương trình khuyến mại</h1>


<?php
echo $this->Form->create('Event',array(
    'class' => 'modify-form'
));

//tên
echo $this->Form->input('name', array(
    'label' => 'Tên',
    'id' => 'name',
    'required'=>'required'
));

//nội dung
echo $this->Form->input('body', array(
    'label' => 'Nội dung',
    'id' => 'body',
    'required'=>'required'
));

//ngày bắt đầu
echo $this->Form->input('started_date', array(
    'label' => 'Ngày Bắt Đầu',
    'class' => 'date',

));

//ngày kết thúc
echo $this->Form->input('end_date', array(
    'label' => 'Ngày Kết Thúc',
    'class' => 'date'
));
?>

<div class="button-group">
<?php
echo $this->Form->button('Lưu', array(
    'class' => 'modify-button btn modify'
));
?>

<button type="button" class="cancel-button btn cancel">
    <?php echo $this->Html->link(
        'Hủy',
        array('controller' => 'events', 'action' => 'index')
    ); ?>
</button>

</div>
</div>
