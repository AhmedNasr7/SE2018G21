<?php

class Course extends Db {
    function __construct($id){
        $stmt =  Db::runQuery('SELECT * FROM `courses` WHERE id = :id ',[ ':id'=>$id ]);
        if($stmt){
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            foreach($data as $key => $value ){
                $this->{$key} = $value;
            }
        }else {
            throw new Exception("Item not found");
        }
    }

    public static function create($name,$max_degree,$study_year){
        $stmt = Db::runQuery('INSERT INTO `courses` (name , max_degree , study_year) 
                            VALUES (:name ,:max_degree , :study_year) ', [ ':name' => $name , ':max_degree'=> $max_degree , ':study_year'=>$study_year] );
    }
    
    public function remove(){
        $stmt = Db::runQuery('DELETE FROM `courses` WHERE id = :id', [ ':id' => $this.id ] );
    }

    public static function removeById($id){
        $stmt = Db::runQuery('DELETE FROM `courses` WHERE id = :id', [ ':id' => $id ] );
    }

    public static function getAll(){
        $stmt = Db::runQuery('SELECT * FROM `courses` ', [] );
        if($stmt){
            return $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else {
            throw new Exception("Item not found");
        }
    }

    public static function update($id,$name){
        $stmt = Db::runQuery('UPDATE `courses` SET name = :studentName WHERE id = :id', [ ':studentName'=> $name,':id' => $id ] );
    }    


}