<?php

class Student extends Db{

    function __construct($id){
        $stmt = Db::runQuery('SELECT * FROM `students` WHERE id = :id', [ ':id' => $id ] );
        if($stmt){
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            foreach($data as $key => $value){
                $this->{$key} = $value;
            }
        }else {
            throw new Exception("Item not found");
        }
    }

    public static function create($name){
        $stmt = Db::runQuery('INSERT INTO `students` (name) VALUES (:name) ', [ ':name' => $name ] );
    }
    
    public function remove(){
        $stmt = Db::runQuery('DELETE FROM `students` WHERE id = :id', [ ':id' => $this.id ] );
    }

    public static function removeById($id){
        $stmt = Db::runQuery('DELETE FROM `students` WHERE id = :id', [ ':id' => $id ] );
    }

    public static function getAll(){
        $stmt = Db::runQuery('SELECT * FROM `students` ', [] );
        if($stmt){
            return $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else {
            throw new Exception("Item not found");
        }
    }

    public static function update($id,$name){
        $stmt = Db::runQuery('UPDATE `students` SET name = :studentName WHERE id = :id', [ ':studentName'=> $name,':id' => $id ] );
    }

}