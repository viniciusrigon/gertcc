<?php
$this->breadcrumbs=array(
	'Anexos',
);

$this->menu=array(
	array('label'=>'Criar Anexo', 'url'=>array('create')),
	array('label'=>'Gerenciar Anexos', 'url'=>array('admin')),
);
?>

<h1>Anexos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
