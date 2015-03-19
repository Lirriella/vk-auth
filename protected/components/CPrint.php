<?php

class CPrint
{

    public static function show($mas, $exit = true)
    {
	echo '<pre>';
	print_r($mas);
	echo '</pre>';
	if ($exit)
	    exit;
    }

    public static function showValue($models, $value = 'id', $exit = false)
    {
	foreach ($models as $model)
	{
	    echo $model->$value . '<br>';
	}
	if ($exit)
	    exit;
    }

}

?>
