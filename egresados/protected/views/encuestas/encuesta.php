<?php

Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/styleCuestionario.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/cuestionario.js');

$this->pageTitle=Yii::app()->name . ' - Encuesta';
$this->breadcrumbs=array(
	'Encuesta',
);
?>
<h1>Encuesta</h1>

<div class="cuestionario">
	<div id="numeroPreguntas"></div>
    <div class="preguntas">
    	
    </div><!-- #preguntas-->
</div><!-- #cuestionario-->
