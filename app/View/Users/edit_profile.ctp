<div class="users form row">
    <h1 class="staff-manage">Sửa thông tin cá nhân</h1>
    <?php echo $this->Form->create('User', array('class'=>'modify-form')); ?>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('fullname', array('label'=>'Họ và tên'));
        echo $this->Form->input('username', array('label'=>'Tên đăng nhập'));
        echo $this->Form->input('password', array('label'=>'Mật khẩu'));
        echo $this->Form->input('dob', array('label'=>'Ngày sinh'));
        echo $this->Form->input('phone_number', array('label'=>'Số điện thoại'));
        echo $this->Form->input('address', array('label'=>'Địa chỉ'));
        echo $this->Form->input('avatar', array('label'=>'Ảnh đại diện ', 'type'=>'file'));

        ?>
    <div class="button-group">
        <button type="submit" class="view-button btn view submit">Lưu</button>
        <button type="button" class="cancel-button btn cancel"><?php echo $this->Html->link(__('Hủy'), array('action' => 'home')); ?></button>
    </div>
</div>