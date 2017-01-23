<?php
$this->breadcrumbs=array(
	'Anexos'=>array('index'),
	$model->id_anexo,
);

$this->menu=array(
	array('label'=>'Listar Anexos', 'url'=>array('index')),
	array('label'=>'Criar Anexo', 'url'=>array('create')),
	array('label'=>'Editar Anexo', 'url'=>array('update', 'id'=>$model->id_anexo)),
	array('label'=>'Excluir Anexo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_anexo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerenciar Anexos', 'url'=>array('admin')),
);
?>

<h1>View Anexo #<?php echo $model->id_anexo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_anexo',
		'caminho',
		'nome',
		'tipo',
	),
)); ?>
