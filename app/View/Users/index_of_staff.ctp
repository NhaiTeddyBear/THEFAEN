<!--<div class="main clearfix">-->
<!--    <aside>-->
<!--        <ul>-->
<!--            <li><a href="#">Quản lí</a></li>-->
<!--            <li><a href="#">Quản lí</a></li>-->
<!--            <li><a href="#">Quản lí</a></li>-->
<!--            <li><a href="#">Quản lí</a></li>-->
<!--            <li><a href="#">Quản lí</a></li>-->
<!--            <li><a href="#">Quản lí</a></li>-->
<!--        </ul>-->
<!--    </aside>-->


<div class="row">
    <ul class="manage">
        <li id="member"><?php echo $this->Html->link(__('Quản lý thành viên'), array('controller'=>'users', 'action'=>'listMember')); ?></li>
        <li id="purchase"><?php echo $this->Html->link(__('Quản lý giao dịch'), array('controller'=>'purchases', 'action'=>'indexOfStaff')); ?></li>
        <li id="post"><?php echo $this->Html->link(__('Quản lý bài viết'), array('controller'=>'posts', 'action'=>'index')); ?></li>
        <li id="ingredient"><?php echo $this->Html->link(__('Quản lý nguyên liệu'), array('controller'=>'ingredients', 'action'=>'index')); ?></li>
        <li id="category"><?php echo $this->Html->link(__('Quản lý danh mục'), array('controller'=>'categories', 'action'=>'index')); ?></li>
        <li id="order"><?php echo $this->Html->link(__('Quản lý đặt hàng'), array('controller'=>'orders', 'action'=>'indexOfStaff')); ?></li>
        <li id="comment"><?php echo $this->Html->link(__('Quản lý comment'), array('controller'=>'comments', 'action'=>'index')); ?></li>
    </ul>
</div>
<!--</div>-->