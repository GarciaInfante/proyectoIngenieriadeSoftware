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
    /*public function actionInsert()
    {
       echo $_POST['Array'];
       if(isset($_POST['pregunta1'])){
            $this->polygon=$_POST['pregunta1'];
            $this->render("test", array('polygon'=>$this->polygon));
       }
       else{
           echo "error";
       }
    }*/
    public function actionInsert()
    {
        /*$post_text = trim(file_get_contents('php://input'));
        $objeto = CJSON::decode($post_text);*/

        // si quieres enviar texto puro:
        if(Yii::app()->request->isPostRequest)
        {
          if(Yii::app()->request->isPostRequest)
        {
            $con = mysql_connect("localhost","root","");
            if (!$con){
                die('Could not connect: ' . mysql_error());
            }
            mysql_select_db("egresados", $con);
            $sql ="INSERT INTO `respuestas`(`rut`, `pregunta1`, `pregunta2`, `pregunta3`, `pregunta4`, `pregunta5`, `pregunta6`, `pregunta7`, `pregunta8`) 
                   VALUES ('16922117-0',{$_POST['pregunta1']},{$_POST['pregunta2']},{$_POST['pregunta3']},'{$_POST['pregunta4']}',{$_POST['pregunta5']},{$_POST['pregunta6']},{$_POST['pregunta7']},{$_POST['pregunta8']})";

            if (!mysql_query($sql,$con)){
                die('Error: ' . mysql_error());
            }
            mysql_close($con); 
        }  
        }

    }
}