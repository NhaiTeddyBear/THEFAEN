<div>
<div class="row">
<?php
if(isset($food) && $foods) {
    foreach ($foods as $food) { ?>
        <dl>
            <dt>Tên món ăn</dt>
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
                $upload_dir = 'http://localhost/ISD_PROJECT/cakephp/app/webroot/upload/' . $food['Food']['image'];
                echo "<img src='$upload_dir' alt='menu' width='200' height='200' />";
                ?>
            </dd>
        </dl>
        <?php
    }
}
else { ?>
    <div class="notification">

   <h2><?php  echo $this->Flash->render('noresult');
}
    ?></h2>
    </div>
</div>
</div>


