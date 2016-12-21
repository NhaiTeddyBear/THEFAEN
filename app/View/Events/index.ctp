<!-- File: /app/View/Events/index.ctp  (edit links added) -->
<?php  $paginator = $this->Paginator; ?>
<div class="row">

<h1 class="staff-manage">Sự kiện</h1>

<div class="notification">
    <h2>
    <?php
    echo $this->Flash->render('editEventSuccess');
    echo $this->Flash->render('editEventFailure');
    echo $this->Flash->render('addEventSuccess');
    echo $this->Flash->render('addEventFailure');
    echo $this->Flash->render('deleteEventSuccess');
    echo $this->Flash->render('deleteEventFailure');
    ?>
    </h2>
</div>
<table>
        <td colspan="9">

            <button type="button" class="view-button btn" style="float: left;">
                <?php echo $this->Html->link("Thêm Sự Kiện", array('action' => 'add')); ?>
            </button>

        </td>

    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Nội Dung</th>
        <th>Ngày Bắt Đầu</th>
        <th>Ngày Kết Thúc</th>
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

    <!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($events as $event): ?>
        <tr>
            <!-- display id -->
            <td><?php echo $event['Event']['id']; ?></td>

            <!-- display name -->
            <td><?php echo $event['Event']['name']; ?></td>

            <!--display body -->
            <td>
                <?php echo $event['Event']['body']; ?>
            </td>

            <!-- display started_date -->
            <td>
                <?php echo $event['Event']['started_date']; ?>
            </td>

            <!-- display end_date -->
            <td>
                <?php echo $event['Event']['end_date']; ?>
            </td>

            <!-- display action -->
            <td>

                <button type="button" class="view-button btn">
                    <?php
                    echo $this->Html->link(
                        'Xem', array('action' => 'view', $event['Event']['id'])
                    );
                    ?>
                </button>

                <button type="button" class="modify-button btn">
                    <?php
                    echo $this->Html->link(
                        'Sửa', array('action' => 'edit', $event['Event']['id'])
                    );
                    ?>
                </button>

                <button type="button" class="delete-button btn">
                    <?php
                    echo $this->Form->postLink(
                        'Xóa',
                        array('action' => 'delete', $event['Event']['id']),
                        array('confirm' => 'Bạn có muốn xóa dữ liệu này không?')
                    );
                    ?>
                </button>
            </td>

        </tr>
    <?php endforeach; ?>

</table>
    </div>