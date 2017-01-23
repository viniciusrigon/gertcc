<?php
$this->breadcrumbs=array(
	'Anexos'=>array('index'),
	$model->id_anexo=>array('view','id'=>$model->id_anexo),
	'Editar',
);

$this->menu=array(
	array('label'=>'Listar Anexos', 'url'=>array('index')),
	array('label'=>'Criar Anexo', 'url'=>array('create')),
	array('label'=>'Visualizar Anexo', 'url'=>array('view', 'id'=>$model->id_anexo)),
	array('label'=>'Gerenciar Anexos', 'url'=>array('admin')),
);
?>

<h1>Editar Anexo <?php echo $model->id_anexo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>