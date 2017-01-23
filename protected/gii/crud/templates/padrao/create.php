<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Criar',
);\n";
?>

$this->menu=array(
	array('label'=>'Listar <?php echo $this->pluralize($this->class2name($this->modelClass)); ?>', 'url'=>array('index')),
	array('label'=>'Gerenciar <?php echo $this->pluralize($this->class2name($this->modelClass)); ?>', 'url'=>array('admin')),
);
?>

<h1>Criar <?php echo $this->modelClass; ?></h1>

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
