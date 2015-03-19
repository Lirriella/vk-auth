 <?php 
    $cs = Yii::app()->clientScript;
    $cs->scriptMap = array(
 'bbq'=>false,
 'jquery.js' => false,
 'jquery.min.js' => false,
 'jquery.ajaxqueue.js' => false,
 'jquery.metadata.js' => false,
    ); 
?>
 <?php echo $content; ?>