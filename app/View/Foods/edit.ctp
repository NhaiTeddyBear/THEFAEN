<!-- File: /app/View/Posts/edit.ctp -->
<div class="row">
<h1 class="staff-manage">Sửa thông tin đồ ăn</h1>

    <!-- create form-->
    <?php
    echo $this->Form->create('Food',array(
        'enctype'=>"multipart/form-data",
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

    <!-- price-->
    <?php
    echo $this->Form->input('price', array(
        'label' => 'Giá',
        'id' => 'price'
    ));
    ?>

    <!-- ID-->
    <?php
//    echo $this->Form->file('image');
    echo $this->Form->input('image', array(
        'label' => 'Ảnh',
        'id' => 'image',
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
            <?php
                echo $this->Html->link("Hủy", array('controller' => 'foods', 'action' => 'index'));
            ?>
        </button>
    </div>



</div>