<?php

class EncuestasController extends Controller
{
    public function actionIndex()
    {
        //if(Yii::app()->user->isGuest){
            //Yii::app()->user->loginRequired();
            
        //}else{
        
            //$model= new Paciente;
            //$this->render('index',array('model'=>$model));
        
            $model=new Respuestas('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Respuestas'])){
                $model->attributes=$_GET['Respuestas'];
            }

            $this->render('index',array(
                'model'=>$model,
            ));
        //}
	
    }
    public function loadModel($rut)
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
    }
    
    public function actionEncuesta()
    {
		$this->render('encuesta');
    }
}