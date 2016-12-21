<?php  $paginator = $this->Paginator; ?>
<div class="row">

    <h1 class="staff-manage">Đặt hàng</h1>

    <div class="notification">
        <h2>
            <?php
            echo $this->Flash->render('editOrderSuccess');
            echo $this->Flash->render('editOrderFailure');
            echo $this->Flash->render('addOrderSuccess');
            echo $this->Flash->render('addOrderFailure');
            echo $this->Flash->render('deleteOrderSuccess');
            echo $this->Flash->render('deleteOrderFailure');
            ?>
        </h2>
    </div>
    <table>

        <tr>
            <th>Tên món</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Địa chỉ</th>
            <th>Ngày</th>
        </tr>

        <tfoot>
        <tr>
            <td colspan="5">
                <?php
                echo $this->Paginator->prev('« Trước ', null, null, array('class' => 'disabled')); //Shows the next and previous links
                echo " | ".$this->Paginator->numbers()." | "; //Shows the page numbers
                echo $this->Paginator->next(' Sau »', null, null, array('class' => 'disabled')); //Shows the next and previous links
                echo " Trang ".$this->Paginator->counter(); // prints X of Y, where X is current page and Y is number of pages
                ?>
            </td>
        </tr>
        </tfoot>

        <?php foreach ($orders as $order): ?>
            <tr>
                <!--food_name -->
                <td><?php echo $order['Food']['name']; ?></td>

                <!-- display quantity -->
                <td><?php echo $order['Order']['quantity']; ?></td>

                <!-- display total -->
                <td><?php echo $order['Order']['total']; ?></td>

                <!-- display detail -->
                <td><?php echo $order['Order']['detail']; ?></td>

                <!-- display date_created -->
                <td><?php echo $order['Order']['date_created']; ?></td>

            </tr>
        <?php endforeach; ?>

    </table>
</div>