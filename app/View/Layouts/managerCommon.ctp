<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>The Faen</title>
    <link rel="stylesheet" href="/thefaen/css/normalize.css">
    <link rel="stylesheet" href="/thefaen/css/style.css">
<!--    <link rel="stylesheet" href="/thefaen/css/bootstrap.css">-->
<!--    <link rel="stylesheet" href="/thefaen/css/bootstrap.min.css">-->
<!--    <link rel="stylesheet" href="/thefaen/css/bootstrap-theme.css">-->
<!--    <link rel="stylesheet" href="/thefaen/css/bootstrap-theme.min.css">-->
    <script src="https://use.fontawesome.com/724d9feeda.js"></script>
</head>

<body>
<header class="main-header">
    <h1 class="name"><a href="index.html" class="selected"><img src="/thefaen/img/logo.png" alt="Logo"></a></h1>
    <ul class="main-nav">
        <div class="container">
            <div class="row1">
                <div class="col-md-4 col-md-offset-3">
<!--                    --><?php //echo $form->create('Post', array('action'=>'/thefaen/users/search'), array('class'=> 'search-form')); ?>
<!--                        <div class="form-group has-feedback">-->
<!--                            <label for="search" class="sr-only">Search</label>-->
<!--                            <input type="text" class="form-control" name="search" id="search" placeholder="search">-->
<!--                            <span class="glyphicon glyphicon-search form-control-feedback"></span>-->
<!--                        </div>-->
<!--                    --><?php //echo $form->submit('Search'); ?>
                </div>
            </div>
        </div>

        <li><?php echo $this->Html->link(__('Trang chủ'), array('controller'=>'users', 'action'=>'home')); ?></li>
        <li><?php echo $this->Html->link(__('Thực đơn'), array('controller'=>'foods', 'action'=>'indexOfMember')); ?></li>
        <li><?php echo $this->Html->link(__('Lien he'), array('controller'=>'feedbacks', 'action'=>'add')); ?></li></li>

<!--        <li class="dropdown">-->
<!--            <a href="#" class="dropbtn">Quản lý</a>-->
<!--            <div class="dropdown-content">-->
<!--                --><?php //echo $this->Html->link(__('Quản lý nhân viên'), array('controller'=>'users', 'action'=>'listStaff')); ?>
<!--                --><?php //echo $this->Html->link(__('Quản lý đồ ăn, đồ uống'), array('controller'=>'foods', 'action'=>'indexOfManager1')); ?>
<!--                --><?php //echo $this->Html->link(__('Quản lý chương trình khuyến mại'), array('controller'=>'events', 'action'=>'index')); ?>
<!--                --><?php //echo $this->Html->link(__('Quản lý thành viên'), array('controller'=>'users', 'action'=>'listMember')); ?>
<!--                --><?php //echo $this->Html->link(__('Quản lý giao dịch'), array('controller'=>'purchases', 'action'=>'indexOfStaff')); ?>
<!--                --><?php //echo $this->Html->link(__('Quản lý bài viết'), array('controller'=>'posts', 'action'=>'index')); ?>
<!--                --><?php //echo $this->Html->link(__('Quản lý nguyên liệu'), array('controller'=>'ingredients', 'action'=>'index')); ?>
<!--                --><?php //echo $this->Html->link(__('Quản lý đặt hàng'), array('controller'=>'orders', 'action'=>'index')); ?>
<!--                --><?php //echo $this->Html->link(__('Quản lý lịch làm việc'), array('controller'=>'schedules', 'action'=>'indexOfManager1')); ?>
<!--                --><?php //echo $this->Html->link(__('Quản lý danh mục món ăn'), array('controller'=>'categories', 'action'=>'index')); ?>
<!--                <!--                --><?php ////echo $this->Html->link(__('Quản lý tiền'), array('controller'=>'money', 'action'=>'index')); ?>
<!--                <!--                --><?php ////echo $this->Html->link(__('Quản lý lịch làm việc'), array('controller'=>'staff_schedule', 'action'=>'index')); ?>
<!--            </div>-->
<!--        </li>-->
        <li class="dropdown">
            <?php  if(isset($_SESSION['Auth']['User'])) { ?>
                <?php
                echo $this->Html->image('/img/avatar.jpg', array('alt' => 'user-avatar', 'class' => 'avatar', 'url' => array('controller' => 'users', 'action' => 'viewProfile')));
                ?>


                <div class="dropdown-content">
                    <?php echo $this->Html->link(__('Tài khoản'), array('controller' => 'users', 'action' => 'viewProfile')); ?>
                    <?php echo $this->Html->link(__('Đơn hàng'), array('controller' => 'orders', 'action' => 'indexOfMember')); ?>
                    <?php echo $this->Html->link(__('Quản lý 1'), array('controller' => 'users', 'action' => 'indexOfStaff')); ?>
                    <?php echo $this->Html->link(__('Quản lý 2'), array('controller' => 'users', 'action' => 'indexOfManager')); ?>
                    <?php echo $this->Html->link(__('Đăng xuất'), array('controller' => 'users', 'action' => 'logout')); ?>
                </div>
                <?php
                    }
                    else{
                        echo $this->Html->image('/img/login-13.jpg', array('alt' => 'user-avatar', 'class' => 'login-ava', 'url' => array('controller' => 'users', 'action' => 'login')));
                    }
                ?>

        </li>
    </ul>
</header><!--/.main-header-->

<div> <?php echo $this->fetch('content'); ?></div>

<script src="/thefaen/js/ckeditor/ckeditor.js"></script>
<script src="/thefaen/js/ckeditor/sample.js"></script>


<footer class="main-footer">
    <div class="social-links">
        <a href="#"><img src="/thefaen/img/facebook-wrap.png" alt="Facebook Logo" class="social-icon"></a>
        <a href="#"><img src="/thefaen/img/instagram-wrap.png" alt="Instagram Logo" class="social-icon"></a>
    </div>
    <div class="address">
        <p>Ngõ A7, Đại học Hà Nội, Nguyễn Trãi, Thanh Xuân</p>
        <p>
            23 Liễu Giai, Ba Đình, Hà Nội
        </p>
    </div>
    <div class="email">
        <p>Hotline: <a href="tel:123456789">123456789</a></p>
        <p>Email: <a href="mailto:abcd@gmail.com">abcd@gmail.com</a></p>
    </div>
</footer>
<script src="/thefaen/js/jquery-3.1.1.min.js"></script>
<script src="/thefaen/js/modal.js"></script>
</body>
</html>