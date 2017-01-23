<div class="form wide">

<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'anexo-form',
  'enableAjaxValidation'=>false,
  'htmlOptions'=>array(
    'enctype'=>'multipart/form-data',
  ),
)); ?>

  <?php echo $form->errorSummary($model); ?>

  <?php if($model->isNewRecord): ?>
  <p class="hint">O tamanho máximo do arquivo não deve ultrapassar <?php //echo $maxfilesize; ?></p>
  <div class="row">
    <?php echo $form->labelEx($model,'arquivo'); ?>
    <?php echo $form->fileField($model,'arquivo'); ?>
    <?php echo $form->error($model,'arquivo'); ?>
  </div>
  <?php endif; ?>

  <div class="row">
    <?php echo $form->labelEx($model,'tipo_arquivo'); ?>
    <?php echo $form->dropDownList($model, 'tipo_arquivo', array('Pdf'=>'Pdf')); ?>
    <?php echo $form->error($model,'tipo_arquivo'); ?>
  </div>

  <div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Criar' : 'Salvar'); ?>
  </div>

<?php $this->endWidget(); ?>

</div><!-- form -->