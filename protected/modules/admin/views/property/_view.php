<?php
/* @var $this PropertyController */
/* @var $data Property */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sqft')); ?>:</b>
	<?php echo CHtml::encode($data->sqft); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('master_plan')); ?>:</b>
	<?php echo CHtml::encode($data->master_plan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('map_location')); ?>:</b>
	<?php echo CHtml::encode($data->map_location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('overview')); ?>:</b>
	<?php echo CHtml::encode($data->overview); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('specifications')); ?>:</b>
	<?php echo CHtml::encode($data->specifications); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('builder')); ?>:</b>
	<?php echo CHtml::encode($data->builder); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amenities')); ?>:</b>
	<?php echo CHtml::encode($data->amenities); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('view_order')); ?>:</b>
	<?php echo CHtml::encode($data->view_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>