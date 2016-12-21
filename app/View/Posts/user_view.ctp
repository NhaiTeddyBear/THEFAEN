<div class="post">
        <?php foreach($posts as $post): ?>
        <h1><?php echo $post['Post']['title']; ?></h1>
        <p> <?php echo substr($post['Post']['body'],0, 200) ; ?> </p>
            <?php echo $this->Html->link('Đọc tiếp...', array('action'=>'read', $post['Post']['id'])); ?>

        <?php endforeach; ?>
    <div>
    <tfoot>
        <tr>
            <td colspan="1">
                <?php
                echo $this->Paginator->prev('« Trước ', null, null, array('class' => 'disabled')); //Shows the next and previous links
                echo " | ".$this->Paginator->numbers()." | "; //Shows the page numbers
                echo $this->Paginator->next(' Sau »', null, null, array('class' => 'disabled')); //Shows the next and previous links
                echo " Trang ".$this->Paginator->counter(); // prints X of Y, where X is current page and Y is number of pages
                ?>
            </td>
        </tr>
        </tfoot>
    </div>
</div>