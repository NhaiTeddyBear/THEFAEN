<div class="users view row">
    <p></p>
    <h1 class="staff-manage">Thông tin cá nhân</h1>

    <div class="notification-home">
        <h2>
            <?php
                echo $this->Flash->render('editProfileSuccess');
                echo $this->Flash->render('editProfileFailure')
            ?>
        </h2>
    </div>

    <div class="col-md-4 left-ava">
        <img src="<?php echo $this->webroot.'avatar/'.$user['User']['avatar']; ?>" width="200" height="250"/>
    </div>

    <div class=" right-info">
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


            <div class="actions button-group">
                <button type="button" class="modify-button btn modify">
                    <?php echo $this->Html->link(__('Sửa'), array('action' => 'editProfile', $user['User']['id'])); ?>
                </button>
                <button type="button" class="cancel-button btn cancel"><?php echo $this->Html->link(__('Hủy'), array('action' => 'home')); ?></button>
            </div>
        </dl>
    </div>
</div>


