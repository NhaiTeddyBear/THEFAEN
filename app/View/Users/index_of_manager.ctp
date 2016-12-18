<div class="row">

    <div class="left">

        <p>fashf</p>
    </div>

    <div class="right">
        <p>háhdfasf2</p>
    </div>

    <ul class="manage">
        <li id="staff"><?php echo $this->Html->link(__('Quản lý nhân viên'), array('controller'=>'users', 'action'=>'listStaff')); ?></li>
        <li id="food"><?php echo $this->Html->link(__('Quản lý đồ ăn'), array('controller'=>'foods', 'action'=>'index')); ?></li>
        <li id="event"><?php echo $this->Html->link(__('Quản lý event'), array('controller'=>'events', 'action'=>'index')); ?></li>
        <!--        <li>--><?php //echo $this->Html->link(__('Quản lý thành viên'), array('controller'=>'users', 'action'=>'listMember')); ?><!--</li>-->
        <!--        <li>--><?php //echo $this->Html->link(__('Quản lý giao dịch'), array('controller'=>'purchases', 'action'=>'index')); ?><!--</li>-->
        <!--        <li>--><?php //echo $this->Html->link(__('Quản lý bài viết'), array('controller'=>'posts', 'action'=>'index')); ?><!--</li>-->
        <!--        <li>--><?php //echo $this->Html->link(__('Quản lý nguyên liệu'), array('controller'=>'ingredients', 'action'=>'index')); ?><!--</li>-->
        <li id="money"><?php echo $this->Html->link(__('Quản lý tiền'), array('controller'=>'money', 'action'=>'index')); ?></li>
        <li id="staff_schedule"><?php echo $this->Html->link(__('Quản lý lịch làm việc'), array('controller'=>'staff_schedule', 'action'=>'index')); ?></li>
    </ul>
</div>
<style>
    .left{
        float: left;
    }

    .right{
        floar: right;
    }
</style>