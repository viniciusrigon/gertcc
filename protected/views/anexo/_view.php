<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_anexo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_anexo), array('view', 'id'=>$data->id_anexo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('caminho')); ?>:</b>
	<?php echo CHtml::encode($data->caminho); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />


</div>