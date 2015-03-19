<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Авторизация';
?>

<div class='main-title'>Авторизация</div>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<!--<p class="note">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения.</p>-->

	<div class="row input-xlarge">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username', array('size' => 20, 'maxlength' => 20)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row input-xlarge">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password', array('size' => 50, 'maxlength' => 50)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row rememberMe form-inline">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Войти', array('class'=>'btn btn-primary', 'style'=>'margin-top:10px')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
