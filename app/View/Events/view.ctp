<div class="row">
<h1 class="staff-manage">Xem thông tin sự kiện</h1>

<dl>
    <dt>ID</dt>

    <dd>
        <?php echo h($event['Event']['id']); ?>
    </dd>

    <dt>Tên</dt>

    <dd>
        <?php echo h($event['Event']['name']); ?>
    </dd>

    <dt>Nội dung</dt>

    <dd>
        <?php echo h($event['Event']['body']); ?>
    </dd>

    <dt>Ngày Bắt Đầu</dt>

    <dd>
        <?php echo h($event['Event']['started_date']); ?>
    </dd>

    <dt>Ngày Kết Thúc</dt>

    <dd>
        <?php echo h($event['Event']['end_date']); ?>
    </dd>

    <div class="button-group">

        <button type="button" class="view-button btn view">
            <?php
            echo $this->Form->postLink(
                'Xóa',
                array('action' => 'delete', $event['Event']['id']),
                array('confirm' => 'Bạn có muốn xóa dữ liệu này không?')
            );
            ?>
        </button>


        <button type="button" class="modify-button btn modify">
            <?php echo $this->Html->link(
                'Sửa',
                array('controller' => 'events', 'action' => 'edit',$event['Event']['id'])
            ); ?>
        </button>

        <button type="button" class="cancel-button btn cancel">
            <?php echo $this->Html->link(
                'Hủy',
                array('controller' => 'events', 'action' => 'index')
            ); ?>
        </button>

    </div>
</dl>


    </div>