<div class = "row">
    <table>
        <dl>
            <div class = "information">
                    <?php echo $content['Information']['content']; ?>
            </div>
            <?php if(isset($_SESSION['Auth']['User']) && $_SESSION['Auth']['User']['role'] == 'Manager'){ ?>
            <button type="button" class="modify-button btn modify"><?php echo $this->Html->link(__('Chỉnh sửa'), array('action' => 'edit')); ?></button>
            <?php } ?>
        </dl>

    </table>



</div>