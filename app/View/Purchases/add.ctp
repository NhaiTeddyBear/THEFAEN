<!-- File: /app/View/Event/add.ctp -->
<div class="row">

    <h1 class="staff-manage">Thêm giao dịch</h1>


    <?php
    echo $this->Form->create('Purchase',array(
        'class' => 'modify-form'
    ));

    //tên món
    echo $this->Form->input('food_id', array(
        'label' => 'Tên món',
        'id' => 'food_id',
        'required'=>'required'
    ));

    //số điện thoại
    echo $this->Form->input('phone_number', array(
        'label' => 'Số điện thoại',
        'class' => 'date',

    ));
    ?>

    <div class="button-group">
        <?php
        echo $this->Form->button('Lưu', array(
            'class' => 'modify-button btn modify',
            'action' => 'indexOfManager'
        ));
        ?>

        <button type="button" class="cancel-button btn cancel">
            <?php echo $this->Html->link(
                'Hủy',
                array('controller' => 'purchases', 'action' => 'indexOfStaff')
            ); ?>
        </button>

    </div>
</div>
