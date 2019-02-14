
<div class="container pt-5">

<div class="row justify-content-around">
    <section id="DR-PROFILE-INFO" class="col-10 col-md-10 col-lg-5 col-xl-5 border-right">
            <div class="row py-md-3">
                <div class="col-12 col-lg-12 pb-3 text-center">
                    <div class="img-thumbnail border-0">
                        <img class="w-25 my-5 mx-auto d-block shadow-sm rounded-circle" src="<?= DIRS::PATH['static-imgs-pat-avatar'] ?>" alt="Dr-Avatar">
                    </div>
                    <h2><small>Patient-</small><?=$profile->first_name?> <?= $profile->last_name?></h2>
                    <!--to check for the login before showing the page-->
                    <?php
                        if ( isset( $_SESSION['loggedinUser'] ) ){
                            //******************************************//
                        if(($profile->user_id)==($_SESSION['loggedinUser']->id)):
                    ?>
                        <div class="btn-group">
                            <a href="<?= DIRS::URL['patient-edit-profile'];?>" class="btn btn-info"> Edit Public Info </a> <!-- link to edit profile page "Anss task"-->
                        </div>
                    <?php
                    endif;
                        }?>
                </div>

                <div class="col-12 col-lg-12">
                    <ul class="list-group list-group-flush text-center"> <!-- From table user and profile -->
                        <li class="list-group-item"><?=$profile->phone?></li>
                        <li class="list-group-item"><?=$profile->birth_day?></li>
                        <li class="list-group-item"><?php if($profile->gender): echo "male"; else: echo "female"; endif; ?></li>
                    </ul>
                </div>
            </div>
    </section>

    <section id="DR-PROFILE-APPOINTMENTS" class="col-10 col-md-10 col-lg-7" >

        <div class="row pt-5 pb-3 justify-content-around">                
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Appointments">
              View Appointments
             </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="Appointments" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Your Appointments</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card border-0">
                            <div class="card-body">
                                <h5 class="card-title">Next Appointments</h5> <!-- from appointments table -->
                                <!--h6 class="card-subtitle mb-2 text-muted">All Appointments will marked as done automatically after passing it's date </h6-->
                                <!--div class="btn btn-info">Make appointment</div--> <!-- link to making appointment "Nasr task" -->
                            </div>
                        </div>
                        <div class="card my-2">
                        <div class="card-body">  
                        <?php
                            $uid=$profile->user_id;
                            $ustmt = DB::runQuery("SELECT appointments.clinic_id, date, appointments.dr_id  FROM `appointments` WHERE pat_id = $uid");
                            if($ustmt)
                            {
                                $udata = $ustmt->fetchAll(PDO::FETCH_ASSOC);
                                if ($udata != false)
                                {
                                    foreach($udata as $uvalue):
                                    $dstmt = DB::runQuery("SELECT first_name, last_name  FROM `profile` WHERE profile.user_id = $uvalue[dr_id]");
                                    if($dstmt){
                                    $ddata = $dstmt->fetch(PDO::FETCH_ASSOC);
                                    }
                                    $cstmt = DB::runQuery("SELECT name  FROM `clinics` WHERE clinics.id = $uvalue[clinic_id]");
                                    if($cstmt){
                                    $cdata = $cstmt->fetch(PDO::FETCH_ASSOC);
                                    }

                        ?>        
                                    
                        
                                <h5 class="card-title">
                                <?php 
                                    echo $uvalue["date"];
                                ?>
                                </h5> <!-- link to appointment views for this appointment -->
                                <h6 class="card-subtitle mb-2 text-muted">Clinic: <?php 
                                if ($cdata != false){
                                    echo $cdata["name"];
                                }
                                else{
                                    echo "No clinic found";
                                }
                                ?>
                                </h6>
                                <!-- link to this clinic -->
                                <h6 class="card-subtitle mb-2 text-muted">Doctor: <?php
                                if ($ddata != false){
                                    echo $ddata["first_name"].$ddata["last_name"];
                                }
                                else{
                                    echo "No doctor found";
                                }
                                 
                                endforeach;
                            }
                            else{
                                echo "no appointment found";
                            }
                            }
                                ?>
                                
                                
                                </h6>
                                
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0">
            <div class="card-body text-center">
                <h3>History</h3>
            </div>
        </div>
        <!--***********************************************************-->
        <div class="card my-2 p-4 m-2">
            <div class="media">
                <h4 class="card-subtitle mb-2 text-muted pt-4 pl-1">Medical History</h4>
            </div>
               <!--to get the medical history of the patient by his id-->                  
            <?php
            $id=$profile->user_id;
            $stmt = DB::runQuery("SELECT description, date, pat_history.dr_id  FROM `pat_history` WHERE pat_id = $id");
            if($stmt){
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if ($data != false)
                {
                    ?>
                    <h5 class="pl-5">
                    <?php
                foreach( $data as $value) :
                echo $value["description"]."<br/>" ;
                endforeach;
                }
                else
                {
                    echo"Item not found";
                }
            }
                 ?>
                 </h5> 
            
                
                
                           
        </div>
        <!--******************************************************************-->
    </section>
</div>
</div>