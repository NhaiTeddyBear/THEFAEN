<div class="row">

    <h1 class="staff-manage">Thêm đơn đặt hàng</h1>

    <?php
    echo $this->Form->create('Order',array(
        'class' => 'modify-form'
    ));

    //số lượng
    echo $this->Form->input('quantity', array(
        'label' => 'Số lượng',
        'id' => 'quantity',
        'required'=>'required',
        'min' => '1'
    ));

    //detail
    echo $this->Form->input('detail', array(
        'label' => 'Địa chỉ',
        'id' => 'detail',
        'required'=>'required'
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
                array('controller' => 'users', 'action' => 'home')
            ); ?>
        </button>

    </div>
</div>
