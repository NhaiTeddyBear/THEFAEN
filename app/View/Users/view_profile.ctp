<div class="row">
    <h1 class="staff-manage">Thông tin cá nhân</h1>
        <dl>
            <dt><?php echo __('Họ và tên'); ?></dt>
            <dd>
                <?php echo h($user['User']['fullname']); ?>
            </dd>
            <dt><?php echo __('Tên đăng nhập'); ?></dt>
            <dd>
                <?php echo h($user['User']['username']); ?>
            </dd>
            <dt><?php echo __('Ngày sinh'); ?></dt>
            <dd>
                <?php echo h($user['User']['dob']); ?>
            </dd>
            <dt><?php echo __('Số điện thoại'); ?></dt>
            <dd>
                <?php echo h($user['User']['phone_number']); ?>
            </dd>
            <dt><?php echo __('Địa chỉ'); ?></dt>
            <dd>
                <?php echo h($user['User']['address']); ?>
            </dd>
            <dt><?php echo __('Ngày tham gia'); ?></dt>
            <dd>
                <?php echo h($user['User']['created']); ?>
            </dd>
            <dt><?php echo __('Ảnh đại diện'); ?></dt>
            <dd>
                <img src="<?php echo $this->webroot.'avatar/'.$user['User']['avatar']; ?>" width="100" height="100"/>
            </dd>
            <div class="actions button-group">
                <button type="button" class="modify-button btn modify">
                    <?php echo $this->Html->link(__('Sửa'), array('action' => 'editProfile', $user['User']['id'])); ?>
                </button>
                <button type="button" class="cancel-button btn cancel">
                    <?php echo $this->Html->link(__('Hủy'), array('controller'=>'users','action' => 'home')); ?>
                </button>
            </div>
        </dl>
  
</div>


