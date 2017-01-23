<?php
$this->breadcrumbs=array(
	'Anexos'=>array('index'),
	'Criar',
);

$this->menu=array(
	array('label'=>'Listar Anexos', 'url'=>array('index')),
	array('label'=>'Gerenciar Anexos', 'url'=>array('admin')),
);
?>

<h1>Criar Anexo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>