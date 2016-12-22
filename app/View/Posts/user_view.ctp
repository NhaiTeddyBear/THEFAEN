<div class="news clearfix">
    <?php foreach($posts as $post): ?>
        <div class="col-md-6 clearfix">
            <a href="#">
                <img src="<?php echo $this->webroot.'post/'.$post['Post']['image']; ?>" class = "img-fluid" alt="Post"/>
                <div class="news-dt">
                    <span><?php echo $post['Post']['title']; ?></span>
                    <p><?php echo substr($post['Post']['body'],0, 200) ; ?>...</p>
                    <b><?php echo $this->Html->link('Xem thêm', array(
                        'controller'=> 'comments',
                        'action'=>'add',$post['Post']['id']
                        ));
                        ?>
                    </b>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>