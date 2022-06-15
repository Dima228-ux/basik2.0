<?php


class Phones extends \yii\db\ActiveRecord
{
    public function checkUserPhone($phone)
    {
        $result=Phones::find()->where(['phone'=>$phone]);
        if(mysqli_num_rows($result)>0)
            return false;
        else
            return true;
    }

    public function insertUserPhone($id_user,$phone)
    {
        $phone=new Phones();
        $phone
    }
}