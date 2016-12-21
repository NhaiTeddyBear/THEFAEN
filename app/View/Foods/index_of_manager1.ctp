<?php  $paginator = $this->Paginator; ?>

<div class="row">
    <h1 class="staff-manage">Đồ ăn, đồ uống</h1>

    <div class="notification">
        <h2>
        <?php
        echo $this->Flash->render('editFoodSuccess');
        echo $this->Flash->render('editFoodFailure');
        echo $this->Flash->render('addFoodSuccess');
        echo $this->Flash->render('addFoodFailure');
        echo $this->Flash->render('deleteFoodSuccess');
        echo $this->Flash->render('deleteFoodFailure');
        ?>
        </h2>
    </div>

    <table>
        <tr>
            <td colspan="5">

                <button type="button" class="view-button btn" style="float: left;">
                    <?php echo $this->Html->link("Thêm Món Mới", array('action' => 'add')); ?>
                </button>
            </td>
        </tr>

        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Ảnh</th>
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
        <?php foreach ($foods as $food): ?>
            <tr>
                <!-- display id -->
                <td><?php echo $food['Food']['id']; ?></td>

                <!-- display name -->
                <td>
                    <?php echo $food['Food']['name']; ?>
                </td>

                <!-- display category_id -->
                <td>
                    <?php echo $food['Category']['name']; ?>
                </td>

                <!-- display price -->
                <td>
                    <?php echo $food['Food']['price']; ?>
                </td>

                <!-- display image -->
                <td>
                    <img src="<?php echo $this->webroot.'upload/'.$food['Food']['image']; ?>" width="100" height="100"/>
                </td>


                <!-- display action -->
                <td>
                    <button type="button" class="view-button btn">
                        <?php
                        echo $this->Html->link(
                            'Xem', array('action' => 'view', $food['Food']['id'])
                        );
                        ?>
                    </button>

                    <button type="button" class="modify-button btn">
                        <?php
                        echo $this->Html->link(
                            'Sửa', array('action' => 'edit', $food['Food']['id'])
                        );
                        ?>
                    </button>

                    <button type="button" class="delete-button btn">
                        <?php
                        echo $this->Form->postLink(
                            'Xóa',
                            array('action' => 'delete', $food['Food']['id']),
                            array('confirm' => 'Bạn có muốn xóa dữ liệu này không?')
                        );
                        ?>
                    </button>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>

</div>




