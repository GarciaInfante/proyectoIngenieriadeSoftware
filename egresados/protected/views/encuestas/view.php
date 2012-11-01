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