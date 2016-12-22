<div class="tin-tuc-single">
    <h2 class="soba"><?php echo $post['Post']['title'];?></h2>
    <img class="mi-soba" src="/img/mi-nhat-ban.jpg" alt="Mi Nhat Ban">
    <p><?php  echo $post['Post']['body']?></p>
    <h3>Bình luận</h3>

    <?php foreach ($comments as $comment) {
        echo $comment['Comment']['detail'];
    }
    echo $this->element('newComment', array("post_id" => $post['Post']['id']));
    ?>

    <?php
        echo $this->Form->create('Comment',array(
            'controller' => 'comments',
//            'action' => 'add',
            'url' => array($post_id),
            'class' => 'modify-form'
        )); ?>

    <legend style="text-transform: uppercase;">Bình luận <span style="color:red">(*)</span></legend>
    <?php if(isset($_SESSION['Auth']['User'])) {?>
    <span style="color:red; font-size: 0.7em; text-align: center;">
        <p>(Chỉ thành viên được quyền sử dụng chức năng này.
            Bạn vui lòng đăng ký tài khoản tại
            <?php $this->Html->link('đây )', array('controller'=>'users', 'action'=>'register'));?>
            <?php } ?>
     </p></span>

    <?php
        echo $this->Form->input('detail', array(
            'label' => 'Nội dung',
            'id' => 'detail',
            'required'=>'required',
            'type'=>'textarea',
        ));
    ?>
    <div class="button-group">
        <?php
        echo $this->Form->button('Gửi bình luận', array(
            'class' => 'modify-button btn modify', array(
                'controller' => 'comments',
                'action' => 'add',
            ),
        ));
        ?>

        <button type="button" class="cancel-button btn cancel">
            <?php echo $this->Html->link(
                'Hủy',
                array('controller' => 'posts', 'action' => 'newSingle')
            ); ?>
        </button>
    </div>
</div>

