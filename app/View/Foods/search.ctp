<div>
<div class="row">
<?php
if(isset($foods)) {
    if ($foods) {
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
                    echo "<img src=".$this->webroot.'upload/'.$food["Food"]['image']." class = 'img-fluid'/>";
                    ?>
                </dd>
            </dl>
            <?php
        }
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


