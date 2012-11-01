<?php
    $this->layout='mainAdmin';
    $this->pageTitle=Yii::app()->name . ' - Agregar Paciente';
?>

<h1>Agregando Paciente</h1>

<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'pacientes-form',
            'enableAjaxValidation'=>false,
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                    'validateOnSubmit'=>true,
            )
    )); ?>

        <?php echo $form->errorSummary($model); ?>
        <div class="row">
            <?php echo $form->labelEx($model,'rut')?>
            <?php echo $form->textField($model,'rut')?>
            <?php echo $form->error($model,'rut')?>	
        </div>
    
        <div class="row">
            <?php echo $form->labelEx($model,'nombres')?>
            <?php echo $form->textField($model,'nombres')?>
            <?php echo $form->error($model,'nombres')?>	
        </div>
    
        <div class="row">
            <?php echo $form->labelEx($model,'apellidoPaterno')?>
            <?php echo $form->textField($model,'apellidoPaterno')?>
            <?php echo $form->error($model,'apellidoPaterno')?>	
        </div>
    
        <div class="row">
            <?php echo $form->labelEx($model,'apellidoMaterno')?>
            <?php echo $form->textField($model,'apellidoMaterno')?>
            <?php echo $form->error($model,'apellidoMaterno')?>		
        </div>
    
        <div class="row">
		<?php echo $form->labelEx($model,'fechaNacimiento'); ?>
		<?php #echo $form->textField($model,'fechaNacimiento');
                $this->widget('zii.widgets.jui.CJuiDatePicker',
                            array(
                            'model'=>$model,
                            'attribute'=>'fechaNacimiento',
                            'language' => 'es',
                            'options' => array(
                                    'dateFormat'=>'yy-mm-dd',
                                    'constrainInput' => 'false',
                                    'duration'=>'fast',
                                    'showAnim' =>'slide',
                                    'changeYear'=>true,
                                    'maxDate'=> Yii::app()->locale->getDateTimeFormat('short')
                            ),
                        )
                );
		?>
		<?php echo $form->error($model,'fechaNacimiento'); ?>
	</div>
        <div class="row">
            <?php echo $form->labelEx($model,'sexo')?>
            <?php echo $form->dropDownList($model,'sexo',Pacientes::getSexo())?>
            <?php echo $form->error($model,'sexo')?>		
        </div>
    
        <div class="row">
            <?php echo $form->labelEx($model,'direccion')?>
            <?php echo $form->textField($model,'direccion')?>
            <?php echo $form->error($model,'direccion')?>		
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'comuna')?>
            <?php echo $form->dropDownList($model,'comuna',Pacientes::getComuna())?>
            <?php echo $form->error($model,'comuna')?>		
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'ciudad')?>
            <?php echo $form->textField($model,'ciudad')?>
            <?php echo $form->error($model,'ciudad')?>		
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'telefono1')?>
            <?php echo $form->textField($model,'telefono1')?>
            <?php echo $form->error($model,'telefono1')?>		
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'telefono2')?>
            <?php echo $form->textField($model,'telefono2')?>
            <?php echo $form->error($model,'telefono2')?>		
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'prevision')?>
            <?php echo $form->dropDownList($model,'prevision',Pacientes::getPrevision())?>
            <?php echo $form->error($model,'prevision')?>		
        </div>
        <div class="row buttons">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Guardar'); ?>
        </div>
    <?php $this->endwidget();?>
</div>