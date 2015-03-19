<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ru" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<!--link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" /-->
		
	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/bootstrap.min.js"); ?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container page-container">

	<div class="header clearfix">
		<div class="logo">
		    <?php echo CHtml::encode(Yii::app()->name); ?>
                    
		</div>
	</div><!-- header -->

	<div class="navbar">
	    <div class="navbar-inner">
		<?php $this->widget('zii.widgets.CMenu',array(
			'encodeLabel'=>false,
			'htmlOptions'=>array('class'=>'nav nav-pills'),
			'items'=>array(
				array('label'=>'Вход', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Выход ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	    </div>
	</div><!-- mainmenu -->
	
	<div class="main-row">
	    <?php echo $content; ?>
	</div>

	<div class="clear"></div>

	<div class="footer">
		<?php echo CVars::footerText() ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
