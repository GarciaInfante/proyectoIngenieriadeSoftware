<?php
class Alumnos extends CActiveRecord{
    
    public static function model($className=__CLASS__){
        return parent::model($className);
    } 
    public function rules()
    {
        return array(
            //array('campo1, campo2, campo3', 'regla de validacion','on'=>'scenario','message'=>'escribo el mensaje de error {attribute} '),
            /*array('rut, nombres,apellidoPaterno,apellidoMaterno, fechaNacimiento,sexo,direccion,comuna,ciudad,telefono1,prevision', 'required','message'=>'{attribute} no puede ser nulo'),
            array('rut,telefono1,telefono2', 'numerical', 'integerOnly'=>true),
            array('sexo,comuna,prevision', 'safe'),
            array('rut', 'length','min'=>8 ,'max'=>9),
            array('nombres', 'length', 'max'=>25),*/
            array('rut', 'safe', 'on'=>'search'),
        );
    }
    public function attributeLabels()
    {
        return array(
                'rut' => 'R.U.T',
        );
    }
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('rut',$this->rut,true);
        return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
        ));
    }
}
