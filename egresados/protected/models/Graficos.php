<?php
class Graficos extends CActiveRecord{
    
    public static function model($className=__CLASS__){
        return parent::model($className);
    } 
    
    public function pregunta1()
    {
        $sql = "SELECT pregunta1, COUNT( pregunta1 ) AS Cantidad FROM respuestas GROUP BY pregunta1";
        $connection=Yii::app()->db;
        $command=$connection->createCommand($sql);
        $dataReader=$command->queryAll();
        
        $respuestasCantidad = array();
        $i =0;
        foreach($dataReader as $row) {
            //echo $row['Cantidad'];
            $respuestasCantidad[$i++] = $row['Cantidad'];
        }
        return $respuestasCantidad;
    }
} 
?>
