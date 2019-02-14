<?php
/**
 * 
 */
class Profile extends DB{
	
	function __construct($userid = null){


        if($userid != null){
            
            $stmt = DB::runQuery('SELECT * FROM `profile`  WHERE user_id = :userid', [ ':userid' => $userid ] );
            if($stmt->rowCount() > 0){
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                foreach($data as $key => $value){
                    $this->{$key} = $value;
                }
            }else {
                return null;
            }

        }else {
            return;
        }

    }

    public static function getByUserId($userid){
    
        return new Profile($userid);
    }

    public static function create($firstname,$lastname,$address,$phone,$birhtday,$gender,$user_id,$dr_major=null){

        $stmt = DB::runQuery('INSERT INTO `profile` (first_name,last_name,address,phone,birth_day,gender,user_id,dr_major) VALUES (:first_name,:last_name,:address,:phone,:birth_day,:gender,:userid,:dr_major)' , [ ':first_name' => $firstname, ':last_name' => $lastname ,':address' => $address, ':phone' => $phone, ':birth_day' => $birhtday, ':gender' => $gender, ':userid'=>$user_id ,':dr_major' => $dr_major ]);
        if($stmt){
            return new Profile( DB::$con->lastInsertId() );
        }else {
            return null;
        }
    }

    public static function update($userid,$firstname,$lastname,$address,$phone,$birhtday,$gender,$dr_major=null){

        $stmt = DB::runQuery('UPDATE `profile` SET first_name = :first_name , last_name = :last_name , address = :address , phone = :phone , birth_day = :birth_day , gender = :gender , dr_major = :dr_major Where user_id = :userid' , 
                            [ ':first_name' => $firstname, ':last_name' => $lastname ,':address' => $address, ':phone' => $phone, ':birth_day' => $birhtday, ':gender' => $gender,':dr_major' => $dr_major , ':userid' => $userid ]);
        if($stmt){
            return true;
        }else {
            return null;
        }
    }

}

?>