<?php

class Grade extends Db{

    function __construct($id){
        $stmt = Db::runQuery('SELECT * FROM `grades` WHERE `id`= :id',[':id'=>$id]);
        if ($stmt){
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            foreach($data as $key => $val){
                $this->{$key} = $val;
            }
        }
        else{
            throw new Exception("Item not found");
        }
    }
    public static function create($studentId, $courseId, $degree, $date){
        $stmt= Db::runQuery('INSERT INTO `grades` (student_id, course_id, degree, examine_at) VALUES (:student_id, :course_id, :degree, :examine_at)',[':student_id'=>$studentId, ':course_id'=>$courseId, ':degree'=>$degree, ':examine_at'=>$date]);
    }
    public static function removeById($id){
        $stmt = Db::runQuery('DELETE FROM `grades` WHERE id = :id', [ ':id' => $id ] );
    }

    public static function getAll(){
        $stmt = Db::runQuery('SELECT * FROM `grades` ', [] );
        if($stmt){
            return $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else {
            throw new Exception("Item not found");
        }
    }

    public static function update($id,$studentId, $courseId, $degree, $date){
        $stmt = Db::runQuery('UPDATE `grades` 
                            SET student_id = :student_id, 
                                course_id = :course_id , 
                                degree = :degree , 
                                examine_at = :examine_at 
                            WHERE id = :id', 
                            [ ':student_id'=> $studentId,':course_id'=> $courseId,':degree'=>$degree, ':examine_at'=> $date,':id' => $id ] );
    }
}



?>