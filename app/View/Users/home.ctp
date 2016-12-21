<!--  Main Section  -->
<div class="banner">
    <p class="banner-text intro">Thưởng thức hương vị mới từ những nguyên liệu tươi ngon nhất.</p>
</div>

<p class="introduction intro">The FAEN làm việc vì một mục tiêu: <br>Tạo nên sự hòa quyện hoàn hảo <br>từ nguyên liệu, kỹ thuật nấu nướng đến cách trình bày món ăn.</p>

<!--Search-->
<div class="row">
<h1 class="staff-manage">Search</h1>
<form action="/thefaen/foods/search" class="modify-form" id="FoodSearchForm" method="post" accept-charset="utf-8">
    <div style="display:none;">
        <input type="hidden" name="_method" value="POST"/>
    </div>
    <div class="input text">
        <label for="FoodName">Tên món ăn</label>
        <input name="data[Food][name]" maxlength="255" type="text" id="FoodName"/>
    </div>
    <div class="button-group">
        <button type="submit" class="view-button btn view submit">Tìm kiếm</button>
    </div>
</div>


<div class="notification-home">
    <h2>
        <?php
        echo $this->Flash->render('addOrderSuccess');
        echo $this->Flash->render('addOrderFailure');
        echo $this->Flash->render('registerFailure');
        echo $this->Flash->render('registerSuccess');
        ?>
    </h2>
</div>

<div class="today">
    <h1>HÔM NAY ĂN GÌ</h1>
    <?php for($i=2; $i<7; $i++){?>
    <hr class="style18">
    <div class="menu clearfix">

        <h2 class="food">THỨ <?php echo $i;?></h2>
        <div class="col-sm-4">
            <h3><?php echo $food88['Food']['name']; ?></h3>
            <?php
            $upload_dir = 'http://localhost/thefaen/app/webroot/upload/'. $food88['Food']['image'];
            echo "<img src='$upload_dir' alt='com-thap-cam' class='img-fluid'/>";
            ?>
            <p>Giá: <?php echo h($food88['Food']['price']); ?>VND</p>

            <?php echo $this->Html->link(
                'Đặt hàng',
                array(
                    'controller' => 'orders',
                    'action' => 'addOfMember', 97
                ),
                array(
                    'class' => 'button order-btn'
                )
            );
            ?>

        </div>

        <div class="col-sm-4">
            <h3><?php echo $food89['Food']['name']; ?></h3>
            <?php
            $upload_dir = 'http://localhost/thefaen/app/webroot/upload/'. $food89['Food']['image'];
            echo "<img src='$upload_dir' alt='com-thap-cam' class='img-fluid'/>";
            ?>
            <p>Giá: <?php echo h($food89['Food']['price']); ?>VND</p>
            <?php echo $this->Html->link(
                'Đặt hàng',
                array('controller' => 'orders', 'action' => 'addOfMember', 98),
                array(
                    'class' => 'button order-btn'
                )
            );
            ?>
        </div>

        <div class="col-sm-4">
            <h3><?php echo $food90['Food']['name']; ?></h3>
            <?php
            $upload_dir = 'http://localhost/thefaen/app/webroot/upload/'. $food90['Food']['image'];
            echo "<img src='$upload_dir' alt='com-thap-cam' class='img-fluid'/>";
            ?>
            <p>Giá: <?php echo h($food90['Food']['price']); ?>VND</p>
            <?php echo $this->Html->link(
                'Đặt hàng',
                array('controller' => 'orders', 'action' => 'addOfMember', 99),
                array(
                    'class' => 'button order-btn'
                )
            );
            ?>
        </div>

        <div class="col-sm-4">
            <h3><?php echo $food91['Food']['name']; ?></h3>
            <?php
            $upload_dir = 'http://localhost/thefaen/app/webroot/upload/'. $food91['Food']['image'];
            echo "<img src='$upload_dir' alt='com-han-quoc' class='img-fluid'/>";
            ?>
            <p>Giá: <?php echo h($food91['Food']['price']); ?>VND</p>
            <?php echo $this->Html->link(
                'Đặt hàng',
                array('controller' => 'orders', 'action' => 'addOfMember', 100),
                array(
                    'class' => 'button order-btn'
                )
            );
            ?>
        </div>

        </div>
    <?php }?>
</div>

<div class="new clearfix">
    <h1>MÓN MỚI</h1>
    <div class="first clearfix">
        <div class="left1">
            <img src="/thefaen/img/mi-nhat-ban.jpg" alt="Mi Nhat Ban" class="img-100">
        </div>
        <div class="right1">
            <h3>Mì Soba</h3>
            <p>Mì Soba là món mì truyền thống của Nhật Bản được làm từ kiều mạch, cùng với Sushi, Tempura làm nên những món ăn tiêu biểu của Nhật Bản. Các loại mì Soba phát triển đa dạng từ mì nóng đến mì lạnh, loại Morisoba hay Yazarusoba cũng rất phổ biến. Nếu có những nhà hàng đặc thù về Soba, thì cũng có loại mì Soba ăn đứng, và loại mì ly chỉ cần đổ nước sôi vào là có thể thưởng thức. Chúng được bày bán và trở thành một trong những món ăn đang tồn tại trong đời sống ẩm thực của người Nhật.</p>
            <p>Giá: 25.000VND</p>
            <?php echo $this->Html->link(
                'Đặt hàng',
                array('controller' => 'orders', 'action' => 'addOfMember', 103),
                array(
                    'class' => 'button order-btn'
                )
            );
            ?>
        </div>
    </div>
    <div class="first clearfix">
        <div class="left2">
            <h3>Spaghetti</h3>
            <p>Spaghetti là một loại mì Ý có dạng sợi tròn nhỏ, được làm từ bột mì loại semolina và nước. Có nhiều món mì kiểu Ý dùng spaghetti, từ spaghetti với pho mát và hạt tiêu hoặc tỏi và dầu, tới món spaghetti với cà chua, thịt và các loại nước xốt khác.</p>
            <p>Giá: 25.000VND</p>
            <?php echo $this->Html->link(
                'Đặt hàng',
                array('controller' => 'orders', 'action' => 'addOfMember', 101),
                array(
                    'class' => 'button order-btn'
                )
            );
            ?>
        </div>
        <div class="right2">
            <img src="/thefaen/img/spaghetti.jpg" alt="Spaghetti" class="img-100">
        </div>
    </div>
</div>


<!--  End Main Section  -->

