<?php  $paginator = $this->Paginator; ?>
<div class="row">

    <h1 class="staff-manage">Lịch làm việc</h1>

    <div class="notification">
        <h2>
            <?php
            echo $this->Flash->render('editScheduleSuccess');
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
                <?php echo $this->Html->link("Thêm Lịch Làm Việc", array('action' => 'add')); ?>
            </button>
        </td>

        <tr>
            <th>ID</th>
            <th>Tên nhân viên</th>
            <th>Ngày</th>
            <th>Ca làm việc</th>
            <th>Tổng số ca</th>
            <th>Thao Tác</th>
        </tr>

        <tfoot>
        <tr>
            <td colspan="6">
                <?php
                echo $this->Paginator->prev('« Previous ', null, null, array('class' => 'disabled')); //Shows the next and previous links
                echo " | ".$this->Paginator->numbers()." | "; //Shows the page numbers
                echo $this->Paginator->next(' Next »', null, null, array('class' => 'disabled')); //Shows the next and previous links
                echo " Page ".$this->Paginator->counter(); // prints X of Y, where X is current page and Y is number of pages
                ?>
            </td>
        </tr>
        </tfoot>



        <?php foreach ($schedules as $schedule): ?>
            <tr>
                <!-- display id -->
                <td><?php echo $schedule['Schedule']['id']; ?></td>

                <td><?php echo $schedule['User']['fullname']; ?></td>

                <!-- display date -->
                <td><?php echo $schedule['Schedule']['date']; ?></td>

                <!-- display shift -->
                <td><?php echo $schedule['Schedule']['shift']; ?></td>

                <!-- display count -->
                <td><?php echo $schedule['Schedule']['count']; ?></td>

                <!-- display action -->
                <td>

                    <button type="button" class="view-button btn">
                        <?php
                        echo $this->Html->link(
                            'Xem', array('action' => 'view', $schedule['Schedule']['id'])
                        );
                        ?>
                    </button>

                    <button type="button" class="modify-button btn">
                        <?php
                        echo $this->Html->link(
                            'Sửa', array('action' => 'edit', $schedule['Schedule']['id'])
                        );
                        ?>
                    </button>

                    <button type="button" class="delete-button btn">
                        <?php
                        echo $this->Form->postLink(
                            'Xóa',
                            array('action' => 'delete', $schedule['Schedule']['id']),
                            array('confirm' => 'Bạn có muốn xóa dữ liệu này không?')
                        );
                        ?>
                    </button>
                </td>

            </tr>
        <?php endforeach; ?>

    </table>
</div>