<div class="container pt-5">

<div class="row justify-content-around">
    <section id="DR-PROFILE-INFO" class="col-10 col-md-10 col-lg-5 col-xl-5 border-right">
            <div class="row py-md-3">
                <div class="col-12 col-lg-12 pb-3 text-center">
                    <div class="img-thumbnail border-0">
                        <img class="w-25 my-5 mx-auto d-block shadow-sm rounded-circle" src="<?= DIRS::PATH['static-imgs-dr-avatar'] ?>" alt="Dr-Avatar">
                    </div>
                    <h2><small>Dr-</small><?= $profile->first_name . " " . $profile->last_name  ?></h2>
                    
                    <?php
                        if(isset($_SESSION['loggedinUser']) && $_SESSION['loggedinUser']->acc_type == 1 && $_SESSION['loggedinUser']->id == $drid ):
                    ?>
                    <div class="btn-group">
                        <a href="./dr.php?v=edit" class="btn btn-info"> Edit Public Info </a> <!-- link to edit profile page "Anss task"-->
                        <a href="<?= DIRS::URL['clinic-list'] ?>" class="btn btn-primary"> Add/Join Clinic </a> <!-- link to clinics page "Ahmed nasr task"-->
                    </div>
                    <?php
                        endif;
                    ?>
                </div>

                <div class="col-12 col-lg-12">
                    <ul class="list-group list-group-flush text-center"> <!-- From table user and profile -->
                        <li class="list-group-item"><?= $profile->phone ?></li>
                        <li class="list-group-item"><?php if($profile->gender): echo "male"; else: echo "female"; endif; ?></li>
                        <li class="list-group-item">Department</li> <!-- From table Majors """ keep it static now """ -->
                    </ul>
                </div>
                <div class="col-12 col-lg-12 mt-2">
                    <div class="card-body">
                        <h5 class="card-title">Your Clinics</h5> <!-- From dr-clinics and clinics tables -->
                        <h6 class="card-subtitle mb-2 text-muted">You can add or join or delete clinics</h6>
                    </div>
                    <div class="row">
                        <div class="col-12 p-2">
                            <ul class="list-group text-center">
                                <?php
                                    foreach($clinics as $clinic):
                                ?>
                                    <a href="<?= DIRS::URL['clinic-profile'].'&clinicid='.$clinic['id'] ?>" class="list-group-item rounded border-0  mb-2 text-white" style="background-color:#2ecc71;">
                                        <?= $clinic['name'] ?>
                                    </a>
                                <?php
                                    endforeach;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section id="DR-PROFILE-APPOINTMENTS" class="col-10 col-md-10 col-lg-7" >
        
        <div class="card border-0">
            <div class="card-body">
                <h5 class="card-title">Next Appointments</h5> <!-- from appointments table -->
                <h6 class="card-subtitle mb-2 text-muted">All Appointments will marked as done automatically after passing it's date </h6>
                
                
                <?php 
                    if( $_SESSION['loggedinUser']->acc_type == 0 ):
                ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#makeAppointment">
                        Make appointment
                    </button>
                <?php
                    endif;
                ?>
            </div>
        </div>
        
        <?php
            foreach($drAppointments as $appointment):
        ?>

        <div class="card my-2 <?php if(isset($_GET['lastid']) && $appointment['id'] == $_GET['lastid']){ echo 'shadow-lg p-3 mb-5'; } ?> ">
            <div class="card-body">
                <a href="#" ><h5 class="card-title"><?= $appointment['date'] ?></h5></a> <!-- link to appointment views for this appointment -->
                <small class="card-subtitle mb-2 text-muted">Clinic: <a href="#"><?php $clinic = new Clinic($appointment['clinic_id']); echo $clinic->name?></a></small> <!-- link to this patient profile -->
                <h6 class="card-subtitle mb-2 text-muted">Patient: <a href="#"><?php $pat = new User($appointment['pat_id']); echo $pat->username?></a></h6> <!-- link to this patient profile -->
                <?php
                    if(isset($_SESSION['loggedinUser']) && $_SESSION['loggedinUser']->acc_type == 1 && $_SESSION['loggedinUser']->id == $_GET['drid'] ):
                ?>
                    <a href="#" class="btn btn-sm btn-info">Write Prescription</a> <!-- link to prescription of ""this patient"" -->
                    <form action="<?= DIRS::URL['appointment-delete'] ?>" method="POST" class="d-inline">
                        <input type="hidden" name="id" value="<?= $appointment['id'] ?>">
                        <input type="hidden" name="dr_id" value="<?= $_GET['drid'] ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Delete this appointment</button>
                    </form>
                <?php
                    endif;
                ?>
            </div>
        </div>

        <?php
            endforeach;
        ?>

    </section>

    <!-- Make appointment modal -->
    <?php 
        if( $_SESSION['loggedinUser']->acc_type == 0 ):
    ?>
        <div class="modal fade" id="makeAppointment" tabindex="-1" role="dialog" aria-labelledby="makeAppointmentLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="makeAppointmentLabel">Appointment Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form action="<?= DIRS::URL['appointment-book'] ?>" method="POST">
                        <div class="modal-body">
                            <div>
                                <small>Dr-<?= $profile->first_name . " " . $profile->last_name  ?></small>
                            </div>

                            <input type="hidden" name="pat_id" value="<?= $_SESSION['loggedinUser']->id ?>">
                            <input type="hidden" name="dr_id" value="<?= $_GET['drid'] ?>">

                            <div class="form-group">
                                <select name="clinic_id" class="form-control">
                                    <?php
                                        foreach($clinics as $clinic):
                                    ?>
                                        <option value="<?= $clinic['id'] ?>"><?= $clinic['name'] ?></option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="date" name="date" class="form-control">
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Book</button>
                        </div>
                        </div>
                </form>
            </div>
        </div>
    <?php
        endif;
    ?>

</div>
</div>


<?php
require_once DIRS::PATH['views-layout-footer'];
?>