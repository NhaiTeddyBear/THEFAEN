<div class="row">
<h1 class="staff-manage">Ăn gì hôm nay?</h1>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($calendar['Calendar']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ngày'); ?></dt>
		<dd>
			<?php echo h($calendar['Calendar']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tên món ăn'); ?></dt>
		<dd>
			<?php echo ($calendar['Food']['name']); ?>&nbsp;
		</dd>

		<dt><?php echo __('Ảnh'); ?></dt>
		<dd>
			<img src="<?php echo $this->webroot.'upload/'.$calendar['Food']['image']; ?>" width="150" height="150"/>
		</dd>

		<dt><?php echo __('Giá'); ?></dt>
		<dd>
			<?php echo ($calendar['Food']['price']); ?>&nbsp;
		</dd>


		<div class="button-group">

			<button type="button" class="view-button btn view">
				<?php
				echo $this->Form->postLink(
					'Xóa',
					array('action' => 'delete', $calendar['Calendar']['id']),
					array('confirm' => 'Bạn có muốn xóa dữ liệu này không?')
				);
				?>
			</button>


			<button type="button" class="modify-button btn modify">
				<?php echo $this->Html->link(
					'Sửa',
					array('controller' => 'calendars', 'action' => 'edit',$calendar['Calendar']['id'])
				); ?>
			</button>

			<button type="button" class="cancel-button btn cancel">
				<?php echo $this->Html->link(
					'Hủy',
					array('controller' => 'calendars', 'action' => 'index')
				); ?>
			</button>

		</div>
	</dl>
</div>
