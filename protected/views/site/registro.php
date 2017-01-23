<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-registro-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>
  <?php if (Yii::app()->user->hasFlash('registro')):?>
  <div class="flash-error"><?php echo Yii::app()->user->getFlash('registro'); ?></div>
  <?php endif; ?>
	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->dropDownList($model,'tipo', array('A'=>'Aluno', 'P'=>'Professor', 'C'=>'Comgrad')); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model,'nome'); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model,'login'); ?>
		<?php echo $form->error($model,'login'); ?>
	</div>
	
	<div class="row">
    <?php echo $form->labelEx($model,'email'); ?>
    <?php echo $form->textField($model,'email'); ?>
    <div class="hint">Somente e-mails @(*.)ufrgs.br</div>
    <?php echo $form->error($model,'email'); ?>
  </div>

	<div class="row">
		<?php echo $form->labelEx($model,'senha'); ?>
		<?php echo $form->passwordField($model,'senha', array('value'=>'', 'autocomplete'=>'off')); ?>
		<?php echo $form->error($model,'senha'); ?>
	</div>

  <div class="row">
    <?php echo $form->labelEx($model,'senha_repeat'); ?>
    <?php echo $form->passwordField($model,'senha_repeat', array('value'=>'', 'autocomplete'=>'off')); ?>
    <?php echo $form->error($model,'senha_repeat'); ?>
  </div>
  
	<div class="row buttons">
		<?php echo CHtml::submitButton('Registrar-se'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->