<!-- File: /app/View/Calendars/edit.ctp -->
<div class="row">
	<h1 class="staff-manage">Sửa thực đơn trong tuần</h1>

	<!-- create form-->
	<?php
	echo $this->Form->create('Calendar',array(
		'enctype'=>"multipart/form-data",
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
	echo $this->Form->input('date', array(
		'label' => 'Ngày',
		'id' => 'date'
	));
	?>


	<!-- price-->
	<?php
	echo $this->Form->input('food_id', array(
		'label' => 'Tên món ăn',
		'id' => 'food_id'
	));
	?>



	<div class="button-group">
		<!--        <button type="button" class="modify-button btn modify">-->
		<?php
		echo $this->Form->button('Lưu', array(
			'class' => 'modify-button btn modify'
		));
		?>
		<!--        </button>-->
		<button type="button" class="cancel-button btn cancel">
			<?php
			echo $this->Html->link("Hủy", array('controller' => 'calendars', 'action' => 'index'));
			?>
		</button>
	</div>



</div>
