<?php


class Users extends \yii\db\ActiveRecord
{
    public function getUserByLoginPassword($login,$password){
        $queryResult=Users::findAll()->where(['login'=>$login,'$password'=>$password]);
        if (mysqli_num_rows($queryResult) == 0)
            return false;
        else
            return $queryResult;


    }

    public function checkEmailUser($id,$email){
        $queryResult=Users::find()->count('email')->where(['email'=>$email,'id'!=$id]);
        if($queryResult["COUNT(email)"]==0)
            return false;
        else
            return true;
    }

    public  function checkLoginEmailUser($login,$email){
        $result=Users::find()->where(['login'=>$login])->orWhere(['email'=>$email]);
        if(mysqli_num_rows($result)>0)
            return false;
        else
            return true;
    }

    public function exit($id){
        $result=Users::updateAll(['auth_string'=>null])->where(['id'=>$id]);
        if($result)
            return true;
        else
            return false;
    }

    public function registedNewUser($login,$password,$email,$name){
       $users=new Users();
       $users->name="$name";
       $users->email="$email";
       $users->login="$login";
       $users->password="$password";
       $users->save();

    }

    public function editUser($id,$email,$name)
    {
        $result=Users::updateAll(['name'=>$name,'email'=>$email])->where(['id'=>$id]);
        if($result)
            return true;
        else
            return false;
    }

}