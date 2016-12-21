<?php  $paginator = $this->Paginator; ?>
<div class="row">

    <h1 class="staff-manage">Tiền lương</h1>



    <div class="notification">
        <h2>
            <?php
            echo $this->Flash->render('editMoneySuccess');
            echo $this->Flash->render('editScheduleFailure');
            echo $this->Flash->render('addScheduleSuccess');
            echo $this->Flash->render('addScheduleFailure');
            echo $this->Flash->render('deleteScheduleSuccess');
            echo $this->Flash->render('deleteScheduleFailure');
            ?>
        </h2>
    </div>
    <table>
        <td colspan="9">

            <button type="button" class="view-button btn" style="float: left;">
                <?php echo $this->Html->link("Thêm tiền lương", array('action' => 'add')); ?>
            </button>
        </td>

        <tr>
            <th>ID</th>
            <th>Tên nhân viên</th>
            <th>Ca làm việc</th>
            <th>Tiền lương/ca</th>
            <th>Tổng tiền lương</th>
            <th>Thao Tác</th>
        </tr>

        <tfoot>
        <tr>
            <td colspan="6">
                <?php
                echo $this->Paginator->prev('« Trước ', null, null, array('class' => 'disabled')); //Shows the next and previous links
                echo " | ".$this->Paginator->numbers()." | "; //Shows the page numbers
                echo $this->Paginator->next(' Sau »', null, null, array('class' => 'disabled')); //Shows the next and previous links
                echo " Trang ".$this->Paginator->counter(); // prints X of Y, where X is current page and Y is number of pages
                ?>
            </td>
        </tr>
        </tfoot>



        <?php foreach ($monies as $money): ?>
            <tr>
                <!-- display id -->
                <td><?php echo $money['Money']['id']; ?></td>

                <!--dispaly user_name-->
                <td><?php echo $money['User']['fullname']; ?></td>

                <!-- display total -->
                <td><?php echo $money['Schedule']['count']; ?></td>

                <!-- display aspect -->
                <td><?php echo $money['Money']['aspect']; ?></td>

                <!-- display amount -->
                <td><?php echo $money['Money']['amount']; ?></td>

                <!-- display action -->
                <td>

                    <button type="button" class="view-button btn">
                        <?php
                        echo $this->Html->link(
                            'Xem', array('action' => 'view', $money['Money']['id'])
                        );
                        ?>
                    </button>

                    <button type="button" class="modify-button btn">
                        <?php
                        echo $this->Html->link(
                            'Sửa', array('action' => 'edit', $money['Money']['id'])
                        );
                        ?>
                    </button>

                    <button type="button" class="delete-button btn">
                        <?php
                        echo $this->Form->postLink(
                            'Xóa',
                            array('action' => 'delete', $money['Money']['id']),
                            array('confirm' => 'Bạn có muốn xóa dữ liệu này không?')
                        );
                        ?>
                    </button>
                </td>

            </tr>
        <?php endforeach; ?>

    </table>
</div>