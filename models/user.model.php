<?php

class User extends DB {

    function __construct($id = null){


        if($id != null){
            
            $stmt = DB::runQuery('SELECT * FROM `users` as usr WHERE id = :id', [ ':id' => $id ] );
            if($stmt){
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                foreach($data as $key => $value){
                    $this->{$key} = $value;
                }
            }else {
                throw new Exception("Item not found");
            }

        }else {
            return;
        }

    }

    public function getById($id){
        return new User($id);
    }

    public function getByUserName($username){
        $stmt = Db::runQuery('SELECT * FROM `users` WHERE username = :us', [ ':us' => $username ] );
        if($stmt->rowCount() > 0){
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            foreach($data as $key => $value){
                $this->{$key} = $value;
            }
            return true;
        }else {
            return null;
        }
    }

    public function saveToDb(){
        $stmt = Db::runQuery('INSERT INTO `users` (username,usermail,password,acc_type) values (:us,:um,:pass,:acct)'
                                , [ ':us'=> $this->username , ':um'=>$this->usermail , ':pass'=>$this->password , ':acct'=>$this->acc_type ] );
        $this->id = DB::$con->lastInsertId();
    }

}