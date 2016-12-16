<div class="row">
<h1 class="staff-manage">Xem thông tin giao dịch</h1>


<dl>
    <dt>ID</dt>

    <dd>
        <?php echo h($purchase['Purchase']['id']); ?>
    </dd>

    <dt>Mặt Hàng</dt>

    <dd>
        <?php echo h($purchase['Foods']['name']); ?>
    </dd>

    <dt>Giá</dt>

    <dd>
        <?php echo h($purchase['Purchase']['price']); ?>
    </dd>

    <dt>Khách Hàng</dt>

    <dd>
        <?php echo h($purchase['User']['fullname']); ?>
    </dd>

    <dt>Số Điện Thoại</dt>

    <dd>
        <?php echo h($purchase['Purchase']['phone_number']); ?>
    </dd>

    <dt>Điểm Thành Viên</dt>

    <dd>
        <?php echo h($purchase['Purchase']['membership_point']); ?>
    </dd>

    <div class="button-group">

        <button type="button" class="view-button btn view">
            <?php
            echo $this->Form->postLink(
                'Xóa',
                array('action' => 'delete', $purchase['Purchase']['id']),
                array('confirm' => 'Bạn có muốn xóa dữ liệu này không?')
            );
            ?>
        </button>


        <button type="button" class="modify-button btn modify">
            <?php echo $this->Html->link(
                'Sửa',
                array('controller' => 'purchases', 'action' => 'edit',$purchase['Purchase']['id'])
            ); ?>
        </button>

        <button type="button" class="cancel-button btn cancel">
            <?php echo $this->Html->link(
                'Hủy',
                array('controller' => 'purchases', 'action' => 'indexOfStaff')
            ); ?>
        </button>

    </div>
</dl>


</div>


