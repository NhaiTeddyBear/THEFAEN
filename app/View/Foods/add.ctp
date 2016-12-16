<!-- File: /app/View/Food/add.ctp -->
<div class="row">
<h1 class="staff-manage">Thêm đồ ăn, đồ uống</h1>


<?php
echo $this->Form->create('Food',array(
    'enctype'=>"multipart/form-data",
    'class' => 'modify-form'
));

//tên
echo $this->Form->input('name', array(
    'label' => 'Tên',
    'id' => 'name',
    'required'=>'required'
));

//loại món
echo $this->Form->input('category_id', array(
    'label' => 'Phân loại món ăn',
    'id' => 'shift',
    'required' => 'required',
    'multiple' => 'checkbox',
    'options' => array(
        '3' => 'Đồ ăn',
        '4' => 'Đồ uống'
    )
));

//giá
echo $this->Form->input('price', array(
    'label' => 'Giá',
    'id' => 'price',
    'required'=>'required'
));

//image
echo $this->Form->input('image', array(
    'label' => 'Ảnh',
    'id' => 'image',
    'required'=>'required',
    'type' => 'file'
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
            array('controller' => 'foods', 'action' => 'index')
        ); ?>
    </button>

    </div>
    </div>


