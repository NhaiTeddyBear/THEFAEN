<!-- File: /app/View/Purchases/index.ctp -->
<?php  $paginator = $this->Paginator; ?>
<div class="row">
    <h1 class="staff-manage">quản lý Giao dịch</h1>

    <table>
        <tr>
            <td colspan="9">

                <button type="button" class="view-button btn" style="float: left;">
                    <?php echo $this->Html->link("Thêm Giao Dịch", array('action' => 'add')); ?>
                </button>
            </td>
            <div class="notification">
                 <h2>
                <?php
                echo $this->Flash->render('editPurchaseSuccess');
                echo $this->Flash->render('editPurchaseFailure');
                echo $this->Flash->render('addPurchaseSuccess');
                echo $this->Flash->render('addPurchaseFailure');
                echo $this->Flash->render('deletePurchaseSuccess');
                echo $this->Flash->render('deletePurchaseFailure');
                ?>
                 </h2>
        </tr>


        <tr>
            <th>Mã Giao Dịch</th>
            <th>Tên thành viên</th>
            <th>Ngày/Giờ</th>
            <th>Thành tiền</th>
            <th>Thao tác</th>
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
        <?php foreach ($purchases as $purchase): ?>
            <tr>
                <!-- display id -->
                <td><?php echo $purchase['Purchase']['id']; ?></td>

                <!-- display user_id -->
                <td>
                    <?php echo $purchase['User']['fullname']; ?>
                </td>

                <!-- display date_created -->
                <td>
                    <?php echo $purchase['Purchase']['date_created']; ?>
                </td>

                <!-- display price -->
                <td>
                    <?php echo $purchase['Purchase']['price']; ?>
                </td>

                <!-- display action -->
                <td>

                    <button type="button" class="view-button btn">
                        <?php
                        echo $this->Html->link(
                            'Xem', array('action' => 'view', $purchase['Purchase']['id'])
                        );
                        ?>
                    </button>

                    <button type="button" class="modify-button btn">
                        <?php
                        echo $this->Html->link(
                            'Sửa', array('action' => 'edit', $purchase['Purchase']['id'])
                        );
                        ?>
                    </button>

                    <button type="button" class="delete-button btn">
                        <?php
                        echo $this->Form->postLink(
                            'Xóa',
                            array('action' => 'delete', $purchase['Purchase']['id']),
                            array('confirm' => 'Bạn có muốn xóa dữ liệu này không?')
                        );
                        ?>
                    </button>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>

</div>



