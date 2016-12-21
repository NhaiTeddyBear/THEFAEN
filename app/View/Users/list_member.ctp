<div class="row">

    <h1 class="staff-manage">Danh sách thành viên</h1>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="9">

                <button type="button" class="view-button btn" style="float: left;">
                    <?php echo $this->Html->link("Thêm thành viên mới", array('action' => 'addMember')); ?>
                </button>
            </td>
            <div class="notification">
                <h2>
                    <?php
                    echo $this->Flash->render('editMemberSuccess');
                    echo $this->Flash->render('editMemberFailure');
                    echo $this->Flash->render('addMemberSuccess');
                    echo $this->Flash->render('addMemberFailure');
                    echo $this->Flash->render('deleteMemberSuccess');
                    echo $this->Flash->render('deleteMemberFailure');
                    ?>
                </h2>
            </div>
        </tr>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Tài khoản</th>
            <th>Ngày sinh</th>
            <th>SĐT</th>
            <th>Địa chỉ</th>
            <th>Vai trò</th>
            <th>Ngày khởi tạo</th>
            <th>Thao tác</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
                <td><?php echo $this->Html->link(($user['User']['fullname']), array('action' => 'viewStaff', $user['User']['id'])); ?>&nbsp;</td>
                <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['dob']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['phone_number']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['address']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['created']); ?>&nbsp;</td>
                <td class="actions">
                    <button type ="button" class="view-button btn"><?php echo $this->Html->link(__('Xem'), array('action' => 'viewMember', $user['User']['id'])); ?></button>
                    <button type="button" class="modify-button btn"><?php echo $this->Html->link(__('Sửa'), array('action' => 'editMember', $user['User']['id'])); ?></button>
                    <button type="button" class="delete-button btn"><?php echo $this->Form->postLink(__('Xóa'), array('action' => 'deleteMember', $user['User']['id']), array('confirm' => __('Bạn có chắc muốn xóa # %s?', $user['User']['id']))); ?></button>
                </td>
            </tr>
        <?php endforeach; ?>
        <tfoot>
        <tr>
            <td colspan="9">
                <?php
				echo $this->Paginator->prev('« Trước ', null, null, array('class' => 'disabled')); //Shows the next and previous links
				echo " | ".$this->Paginator->numbers()." | "; //Shows the page numbers
				echo $this->Paginator->next(' Sau »', null, null, array('class' => 'disabled')); //Shows the next and previous links
				echo " Trang ".$this->Paginator->counter(); // prints X of Y, where X is current page and Y is number of pages
				?>
            </td>
        </tr>
        </tfoot>
    </table>
</div>



