<!--  Main Section  -->
<div class="today">
    <h2 class="food">ĐỒ ĂN</h2>
    <div class="menu clearfix">
        <?php foreach ($foods as $food): ?>

            <div class="col-sm-4">
                <h3 class="menu-list"><?php echo $food['Food']['name']; ?></h3>
                <img src="<?php echo $this->webroot.'upload/'.$food['Food']['image']; ?>" class = "img-fluid"/>
                <p>Giá: <?php echo $food['Food']['price']; ?>VND</p>
                <?php echo $this->Html->link(
                    'Đặt hàng',
                    array(
                        'controller' => 'orders',
                        'action' => 'addOfMember', $food['Food']['id']
                    ),
                    array(
                        'class' => 'button order-btn'
                    )
                );
                ?>
            </div>
        <?php endforeach; ?>
    </div>

    <hr class="style18">
    <h2 class="drink">ĐỒ UỐNG</h2>
    <div class="menu clearfix">
        <?php foreach ($food4s as $food4): ?>
            <div class="col-sm-4">
                <h3 class="menu-list"><?php echo $food4['Food']['name']; ?></h3>
                <img src="<?php echo $this->webroot.'upload/'.$food4['Food']['image']; ?>" class = "img-fluid"/>
                <p>Giá: <?php echo $food4['Food']['price']; ?>VND</p>
                <?php echo $this->Html->link(
                    'Đặt hàng',
                    array(
                        'controller' => 'orders',
                        'action' => 'addOfMember', $food4['Food']['id']
                    ),
                    array(
                        'class' => 'button order-btn'
                    )
                    );
                ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!--  End Main Section  -->