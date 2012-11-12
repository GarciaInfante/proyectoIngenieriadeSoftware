<?php

class GraficosController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }
    public function actionPregunta1()
    {
        $model=  Graficos::pregunta1();
        $this->render('pregunta1', array(
             'pregunta1'=>$model
        ));
    }
    /*public function loadModel($rut)
    {
		$model=Alumnos::model()->findByPk($rut);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
    }
    protected function performAjaxValidation($model)
    {
		if(isset($_POST['ajax']) && $_POST['ajax']==='experiencia-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
   
    
    public function actionView($rut)
    {
        $alumnos=Alumnos::model()->find('rut=:rut',array(
                                                                ':rut'=>$rut,
                                                                ));
        
        $encuestas=  Respuestas::model()->find('rut=:rut',array(
                                                                ':rut'=>$rut,
                                                                ));
        
	$this->render('view',array(
			'data'=>$this->loadModel($rut),                      
                        'alumnos'=>$alumnos,
                        'encuestas'=>$encuestas,
	));	
    }    */
}