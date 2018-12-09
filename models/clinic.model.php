<?php

class Clinic extends DB {

    function __construct($rowID = null){


        if($rowID != null){
            
            $stmt = DB::runQuery('SELECT * FROM `clinics`  WHERE id = :id', [ ':id' => $rowID ] );
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
        return new Clinic($id);
    }


}