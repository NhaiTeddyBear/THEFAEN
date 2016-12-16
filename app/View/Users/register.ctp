<div class="row">

    <h1 class="staff-manage">Thông tin người dùng</h1>

    <?php
    echo $this->Form->create('User',array(
        'class' => 'modify-form',
        'enctype'=>"multipart/form-data",
    ));

    //họ tên
    echo $this->Form->input('fullname', array(
        'label' => 'Họ tên',
        'id' => 'fullname',
        'required'=>'required'
    ));

    //username
    echo $this->Form->input('username', array(
        'label' => 'Tên đăng nhập',
        'id' => 'username',
        'required'=>'required'
    ));

    //password
    echo $this->Form->input('password', array(
        'label' => 'Mật khẩu',
        'id' => 'password',
        'required'=>'required'
    ));

    //dob
    echo $this->Form->input('dob', array(
        'label' => 'Ngày sinh',
        'id' => 'dob',
        'required'=>'required',
        'type'=>'date',
    ));

    //phone_number
    echo $this->Form->input('phone_number', array(
        'label' => 'Điện thoại',
        'id' => 'phone_number',
        'required'=>'required',

    ));

    //address
    echo $this->Form->input('address', array(
        'label' => 'Điạ chỉ',
        'id' => 'address',
        'required'=>'required',

    ));

    //avatar
    echo $this->Form->input('avatar', array(
        'label' => 'Ảnh đại diện',
        'id' => 'avatar',
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
                array('controller' => 'users', 'action' => 'register')
            ); ?>
        </button>

    </div>
</div>
