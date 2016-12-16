<div class="post">
        <h1><?= $post['Post']['title']; ?></h1>
        <p>
            <?= $post['Post']['body']; ?>
        </p>
    <div class="comment">
        <h3> Bình luận </h3>
        <?php
        foreach($comments as $comment){ ?>
            <p><?php
                echo $comment['Comment']['user_id'];
                ?>
                <?= $comment['Comment']['content']; ?>
            </p>
        <?php } ?>

        <?php echo $this->Form->create('Comment'); ?>
        <?php
        echo $this->Form->input('content', array('label'=>'Nội dung'))
        ?> <button type="submit" class="view-button btn view submit">Đăng</button>
    </div>
</div>