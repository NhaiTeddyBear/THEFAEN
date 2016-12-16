<div class="row">

	<h1 class="staff-manage">Sửa lịch làm việc</h1>

	<!-- create form-->
	<?php
	echo $this->Form->create('Schedule',array(
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

	<!-- name-->
	<?php
	echo $this->Form->input('user_id', array(
		'label' => 'Tên nhân viên',
		'id' => 'user_id'
	));
	?>

	<!-- date-->
	<?php
	echo $this->Form->input('date', array(
		'label' => 'Ngày',
		'id' => 'date',
		'required' => 'required'
	));
	?>

	<!-- shift-->
	<?php
	echo $this->Form->input('shift', array(
		'label' => 'Ca Làm Việc',
		'id' => 'shift',
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
		<!--        </button>-->
		<button type="button" class="cancel-button btn cancel">
			<?php
			echo $this->Html->link("Hủy", array('controller' => 'schedules', 'action' => 'indexÒManager'));
			?>
		</button>
	</div>


</div>