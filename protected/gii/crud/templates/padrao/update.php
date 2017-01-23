<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	'Editar',
);\n";
?>

$this->menu=array(
	array('label'=>'Listar <?php echo $this->pluralize($this->class2name($this->modelClass)); ?>', 'url'=>array('index')),
	array('label'=>'Criar <?php echo $this->modelClass; ?>', 'url'=>array('create')),
	array('label'=>'Visualizar <?php echo $this->modelClass; ?>', 'url'=>array('view', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('label'=>'Gerenciar <?php echo $this->pluralize($this->class2name($this->modelClass)); ?>', 'url'=>array('admin')),
);
?>

<h1>Editar <?php echo $this->modelClass." <?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>