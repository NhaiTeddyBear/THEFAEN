<div class="row">

	<h1 class="staff-manage">Sửa thông tin đơn đặt hàng</h1>

	<!-- create form-->
	<?php
	echo $this->Form->create('Order',array(
		'class' => 'modify-form'
	));
	?>

	<!-- ID-->
	<?php
	echo $this->Form->input('id', array(
		'label' => 'ID',
		'id' => 'id'
	));
	?>

	<!-- tên món-->
	<?php
	echo $this->Form->input('food_id', array(
		'label' => 'Tên món',
		'id' => 'food_id'
	));
	?>

	<!-- số lượng-->
	<?php
	echo $this->Form->input('quantity', array(
		'label' => 'Số lượng',
		'id' => 'quantity'
	));
	?>

	<!-- địa chỉ-->
	<?php
	echo $this->Form->input('detail', array(
		'label' => 'địa chỉ',
		'id' => 'detail'
	));
	?>

	<div class="button-group">
		<?php
		echo $this->Form->button('Lưu', array(
			'class' => 'modify-button btn modify'
		));
		?>
		<button type="button" class="cancel-button btn cancel">
			<?php
			echo $this->Html->link("Hủy", array('controller' => 'orders', 'action' => 'indexOfStaff'));
			?>
		</button>
	</div>

</div>

