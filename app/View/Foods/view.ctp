<div class="row">
<h1 class="staff-manage">Xem thông tin món ăn</h1>


<dl>
    <dt>ID</dt>

    <dd>
        <?php echo h($food['Food']['id']); ?>
    </dd>

    <dt>Tên</dt>

    <dd>
        <?php echo h($food['Food']['name']); ?>
    </dd>

    <dt>Giá</dt>

    <dd>
        <?php echo h($food['Food']['price']); ?>
    </dd>

    <dt>Ảnh</dt>

    <dd>
        <?php
        $upload_dir = 'http://localhost/ISD_PROJECT/cakephp/app/webroot/upload/'. $food['Food']['image'];
        echo "<img src='$upload_dir' alt='menu' width='200' height='200' />";
        ?>
    </dd>

    <div class="button-group">

        <button type="button" class="view-button btn view">
            <?php
            echo $this->Form->postLink(
                'Xóa',
                array('action' => 'delete', $food['Food']['id']),
                array('confirm' => 'Bạn có muốn xóa dữ liệu này không?')
            );
            ?>
        </button>


        <button type="button" class="modify-button btn modify">
            <?php echo $this->Html->link(
                'Sửa',
                array('controller' => 'foods', 'action' => 'edit',$food['Food']['id'])
            ); ?>
        </button>

        <button type="button" class="cancel-button btn cancel">
            <?php echo $this->Html->link(
                'Hủy',
                array('controller' => 'foods', 'action' => 'index')
            ); ?>
        </button>

    </div>
</dl>

</div>

