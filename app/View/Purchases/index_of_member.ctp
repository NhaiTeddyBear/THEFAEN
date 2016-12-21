<!-- File: /app/View/Purchases/index.ctp -->
<?php  $paginator = $this->Paginator; ?>
<div class="row">
    <h1 class="staff-manage">Nhật ký giao dịch</h1>

    <table id="purchase">

        <tr>
            <th>Mã Giao Dịch</th>
            <th>Thời Gian</th>
            <th>Mặt Hàng</th>
            <th>Thành tiền</th>
            <th>Chi tiết</th>
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

        <?php foreach ($purchases as $purchase): ?>
            <tr>
                <td><?php echo h($purchase['Purchase']['id']); ?>&nbsp;</td>
                <td><?php echo h($purchase['Purchase']['date_created']); ?></td>
                <td><?php echo $purchase['Foods']['name']; ?>&nbsp;</td>
                <td><?php echo h($purchase['Purchase']['price']); ?>&nbsp;</td>
                <td><button type="button" class="view-button btn" id="myBtn">Xem Chi Tiết</button></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">×</span>
                <h2>Chi tiết giao dịch</h2>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <th>Mặt hàng</th>
                        <th>Thành tiền</th>
                        <th>Điểm tích lũy</th>
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

                    <?php foreach ($purchases as $purchase): ?>
                        <tr>
                            <td><?php echo $purchase['Foods']['name']; ?>&nbsp;</td>
                            <td><?php echo h($purchase['Purchase']['price']); ?>&nbsp;</td>
                            <td><?php echo h($purchase['Purchase']['membership_point']); ?>&nbsp;</td>
                        </tr>


                    <?php endforeach; ?>

                </table>
            </div>
            <div class="modal-footer">
                <h3>Modal Footer</h3>
            </div>
        </div>

    </div>
</div>