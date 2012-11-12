<?php
    $this->pageTitle=Yii::app()->name . ' - Encuestas';
?>

<h1>ENCUESTAS</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'ENCUESTAS-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'ajaxUpdate'=>false,
    'columns'=>array(
        array(
            'name'=>'rut',          // display the 'title' attribute
            'headerHtmlOptions'=>array('style'=>'width:80px!important'),
        ),
        array(
            'class'=>'CButtonColumn',
            'header'=>'Acciones',
            'viewButtonUrl'=>'Yii::app()->controller->createUrl("view",array("rut"=>$data->rut))',
            'viewButtonImageUrl'=>Yii::app()->baseUrl.'/images/021.png',
            /*'updateButtonImageUrl'=>Yii::app()->baseUrl.'/images/017.png',
            'deleteButtonImageUrl'=>Yii::app()->baseUrl.'/images/004.png',*/
            'htmlOptions'=>array('style'=>'width:80px!important'),
            'headerHtmlOptions'=>array('style'=>'width:80px!important'),
            'template'=>'{view}',
        ),
    ),
));
?>
