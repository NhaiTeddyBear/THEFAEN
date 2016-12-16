<div class="row">

	<h1 class="staff-manage">Thêm lịch làm việc</h1>


	<?php
	echo $this->Form->create('Schedule',array(
		'class' => 'modify-form'
	));

	//tên nhân viên
	echo $this->Form->input('user_id', array(
		'label' => 'Tên nhân viên',
		'id' => 'user_id',
		'required'=>'required'
	));

	//ngày làm việc
	echo $this->Form->input('date', array(
		'label' => 'Ngày',
		'id' => 'date',
		'required'=>'required'
	));

	//ca làm việc
	echo $this->Form->input('shift', array(
		'label' => 'Ca Làm Việc',
		'id' => 'shift',
		'required' => 'required',
		'multiple' => 'checkbox',
		'options' => array(
			'Ca Sáng' => 'Ca Sáng',
			'Ca Chiều' => 'Ca Chiều',
			'Ca Phụ' => 'Ca Phụ'
		)
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
				array('controller' => 'schedules', 'action' => 'indexOfManager')
			); ?>
		</button>

	</div>
</div>


