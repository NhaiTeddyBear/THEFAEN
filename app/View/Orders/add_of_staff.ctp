<div class="row">

	<h1 class="staff-manage">Thêm đơn đặt hàng</h1>

	<?php
	echo $this->Form->create('Order',array(
		'class' => 'modify-form'
	));

	//tên món
	echo $this->Form->input('food_id', array(
		'label' => 'Tên món',
		'id' => 'food_id',
		'required'=>'required'
	));

	//số lượng
	echo $this->Form->input('quantity', array(
		'label' => 'Số lượng',
		'id' => 'quantity',
		'required'=>'required',
		'min' => '1'
	));

	//detail
	echo $this->Form->input('detail', array(
		'label' => 'Địa chỉ',
		'id' => 'detail',
		'required'=>'required'
	));

?>

	<div class="button-group">
		<?php
		echo $this->Form->button('Lưu', array(
			'class' => 'modify-button btn modify'
		));
		?>

		<button type="button" class="cancel-button btn cancel">
			<?php echo $this->Html->link(
				'Hủy',
				array('controller' => 'orders', 'action' => 'indexOfStaff')
			); ?>
		</button>

	</div>
</div>
