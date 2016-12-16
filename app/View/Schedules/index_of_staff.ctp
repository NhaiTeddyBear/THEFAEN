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

        <tr>
            <th>Ngày</th>
            <th>Ca làm việc</th>
            <th>Tổng số ca</th>
        </tr>

        <tfoot>
        <tr>
            <td colspan="3">
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
                <!-- display date -->
                <td><?php echo $schedule['Schedule']['date']; ?></td>

                <!-- display shift -->
                <td><?php echo $schedule['Schedule']['shift']; ?></td>

                <!-- display count -->
                <td><?php echo $schedule['Schedule']['count']; ?></td>


            </tr>
        <?php endforeach; ?>

    </table>
</div>