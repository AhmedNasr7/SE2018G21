<?php
/**
 * 
 */
class Profile extends DB{
	
	function __construct($userid = null){


        if($id != null){
            
            $stmt = DB::runQuery('SELECT * FROM `profile`  WHERE userid = :userid', [ ':userid' => $user_id ] );
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

    public function getById($userid){
     
        return new Pat_Profile($userid);
    }

    public static function create($firstname,$lastname,$address,$phone,$birhtday,$gender,$drmajor){

    	$stmt = DB::runQuery('INSERT INTO `profile` (first_name,last_name,address,phone,birth_day,gender,dr_major) VALUES (:first_name,:last_name,:address,:phone,:birth_day,:gender,:dr_major)' , [ ':first_name' => $firstname, ':last_name' => $lastname ,':address' => $address, ':phone' => $phone, ':birth_day' => $birhtday, ':gender' => $gender,':dr_major' => $dr_major ]);


    }

    public static function edit($userid,$firstname,$lastname,$address,$phone,$birhtday,$gender,$drmajor){

    	$stmt = DB::runQuery('UPDATE `profile` SET first_name = :first_name , last_name = :last_name , address = :address , phone = :phone , birth_day = :birth_day , gender = :gender , dr_major = :dr_major Where user_id = :userid' , [ ':first_name' => $firstname, ':last_name' => $lastname ,':address' => $address, ':phone' => $phone, ':birth_day' => $birhtday, ':gender' => $gender,':dr_major' => $dr_major , ':userid' => $userid ]);


    }

}

?>