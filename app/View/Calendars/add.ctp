
<!-- File: /app/View/Food/add.ctp -->
<div class="row">
	<h1 class="staff-manage">Thêm thực đơn</h1>


	<?php
	echo $this->Form->create('Food',array(
		'class' => 'modify-form'
	));

	//date
	echo $this->Form->input('date', array(
		'label' => 'Ngày',
		'id' => 'date',
		'required'=>'required'
	));

	//food_id
	echo $this->Form->input('food_id', array(
		'label' => 'Tên món ăn',
		'id' => 'food_id',
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
				array('controller' => 'calendars', 'action' => 'index')
			); ?>
		</button>

	</div>
</div>


