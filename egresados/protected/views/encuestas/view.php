<?php
    $this->pageTitle=Yii::app()->name . ' - Encuestas';
?>

<div class="view">
    <h1>Información Personal</h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$data,
        'cssFile' => Yii::app()->baseUrl . '/css/CDetailView.css',
	'attributes'=>array(
		'rut',
                'carrera',
                'egresado',
                'titulado',
                'telefono',
                'movil',
                'correo' ,
	),
)); ?>
</div>

<div class="view">
    
<?php 
    if($encuestas->pregunta1 == 1)
        $encuestas->pregunta1 ="pregunta 1 respuesta 1";
    if($encuestas->pregunta1 == 2)
        $encuestas->pregunta1 ="pregunta 1 respuesta 2";
    if($encuestas->pregunta1 == 3)
        $encuestas->pregunta1 ="pregunta 1 respuesta 3";
    if($encuestas->pregunta1 == 4)
        $encuestas->pregunta1 ="pregunta 1 respuesta 4";
    if($encuestas->pregunta1 == 5)
        $encuestas->pregunta1 ="pregunta 1 respuesta 5";
    if($encuestas->pregunta1 == 6)
        $encuestas->pregunta1 ="pregunta 1 respuesta 6";
    
    if($encuestas->pregunta2 == 1)
        $encuestas->pregunta2 ="pregunta 2 respuesta 1";
    if($encuestas->pregunta2 == 2)
        $encuestas->pregunta22 ="pregunta 2 respuesta 2";
    if($encuestas->pregunta2 == 3)
        $encuestas->pregunta2 ="pregunta 2 respuesta 3";
    if($encuestas->pregunta2 == 4)
        $encuestas->pregunta2 ="pregunta 2 respuesta 4";
    
    if($encuestas->pregunta3 == 1)
        $encuestas->pregunta3 ="pregunta 3 respuesta 1";
    if($encuestas->pregunta3 == 2)
        $encuestas->pregunta3 ="pregunta 3 respuesta 2";
    if($encuestas->pregunta3 == 3)
        $encuestas->pregunta3 ="pregunta 3 respuesta 3";
    if($encuestas->pregunta3 == 4)
        $encuestas->pregunta3 ="pregunta 3 respuesta 4";
    if($encuestas->pregunta3 == 5)
        $encuestas->pregunta3 ="pregunta 3 respuesta 5";
    if($encuestas->pregunta3 == 6)
        $encuestas->pregunta3 ="pregunta 3 respuesta 6";
    if($encuestas->pregunta3 == 7)
        $encuestas->pregunta3 ="pregunta 3 respuesta 7";
    
     if($encuestas->pregunta4 == 1)
        $encuestas->pregunta4 ="pregunta 4 respuesta 1";
    if($encuestas->pregunta4 == 2)
        $encuestas->pregunta4 ="pregunta 4 respuesta 2";
    if($encuestas->pregunta4 == 3)
        $encuestas->pregunta4 ="pregunta 4 respuesta 3";
    if($encuestas->pregunta4 == 4)
        $encuestas->pregunta4 ="pregunta 4 respuesta 4";
    if($encuestas->pregunta4 == 5)
        $encuestas->pregunta4 ="pregunta 4 respuesta 5";
    
    if($encuestas->pregunta5 == 1)
        $encuestas->pregunta5 ="pregunta 5 respuesta 1";
    if($encuestas->pregunta5 == 2)
        $encuestas->pregunta5 ="pregunta 5 respuesta 2";
    
    if($encuestas->pregunta6 == 1)
        $encuestas->pregunta6 ="pregunta 6 respuesta 1";
    if($encuestas->pregunta6 == 2)
        $encuestas->pregunta6 ="pregunta 6 respuesta 2";
    if($encuestas->pregunta6 == 3)
        $encuestas->pregunta6 ="pregunta 6 respuesta 3";
    if($encuestas->pregunta6 == 4)
        $encuestas->pregunta6 ="pregunta 6 respuesta 4";
    if($encuestas->pregunta6 == 5)
        $encuestas->pregunta6 ="pregunta 6 respuesta 5";
    if($encuestas->pregunta6 == 6)
        $encuestas->pregunta6 ="pregunta 6 respuesta 6";
    
    if($encuestas->pregunta7 == 1)
        $encuestas->pregunta7 ="pregunta 7 respuesta 1";
    if($encuestas->pregunta7 == 2)
        $encuestas->pregunta7 ="pregunta 7 respuesta 2";
    if($encuestas->pregunta7 == 3)
        $encuestas->pregunta7 ="pregunta 7 respuesta 3";
    if($encuestas->pregunta7 == 4)
        $encuestas->pregunta7 ="pregunta 7 respuesta 4";
    
    if($encuestas->pregunta8 == 1)
        $encuestas->pregunta8 ="pregunta 8 respuesta 1";
    if($encuestas->pregunta8 == 2)
        $encuestas->pregunta8 ="pregunta 8 respuesta 2";
?>
    
    <h1>Encuesta</h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$encuestas,
        'cssFile' => Yii::app()->baseUrl . '/css/CDetailView.css',
	'attributes'=>array(
                'pregunta1',
                'pregunta2',
                'pregunta3',
                'pregunta4',
                'pregunta5',
                'pregunta6',
                'pregunta7',
                'pregunta8' 
	),
        
)); ?>
</div>

<?php echo CHtml::link('regresar','index'); ?>