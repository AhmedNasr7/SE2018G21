
<div class="container pt-5">

<div class="row justify-content-around">
    <section id="DR-PROFILE-INFO" class="col-10 col-md-10 col-lg-5 col-xl-5 border-right">
            <div class="row py-md-3">
                <div class="col-12 col-lg-12 pb-3 text-center">
                    <div class="img-thumbnail border-0">
                        <img class="w-25 my-5 mx-auto d-block shadow-sm rounded-circle" src="<?= DIRS::PATH['static-imgs-pat-avatar'] ?>" alt="Dr-Avatar">
                    </div>
                    <h2><small>Patient-</small><?=$profile->first_name?> <?= $profile->last_name?></h2>
                    <?php
                        if(($profile->user_id)==($_SESSION['loggedinUser']->id)):
                    ?>
                        <div class="btn-group">
                            <a href="<?= DIRS::URL['patient-edit-profile'];?>" class="btn btn-info"> Edit Public Info </a> <!-- link to edit profile page "Anss task"-->
                        </div>
                    <?php
                    endif?>
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
                                <h6 class="card-subtitle mb-2 text-muted">All Appointments will marked as done automatically after passing it's date </h6>
                                <div class="btn btn-info">Make appointment</div> <!-- link to making appointment "Nasr task" -->
                            </div>
                        </div>
                                            
                        <div class="card my-2">
                            <div class="card-body">
                                <a href="#" ><h5 class="card-title">10 oct 2020 | 03:30AM</h5></a> <!-- link to appointment views for this appointment -->
                                <h6 class="card-subtitle mb-2 text-muted">Clinic: <a href="#">Cleopatra Clinic</a></h6>
                                <!-- link to this clinic -->
                                <h6 class="card-subtitle mb-2 text-muted">Doctor: <a href="#">ahmed nasr</a></h6> <!-- link to this patient profile -->
                                <a href="#" class="card-link">Mark as Done</a> <!-- future function ajax to set appointment as done -->
                                <a href="#" class="card-link">View Prescription</a> <!-- link to prescription of ""this patient"" -->
                            </div>
                        </div>

                        <div class="card my-2">
                            <div class="card-body">
                                <h5 class="card-title">10 oct 2020 | 03:30AM</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Clinic: <a href="#">Cleopatra Clinic</a></h6>
                                <h6 class="card-subtitle mb-2 text-muted">Doctor: <a href="#">ahmed nasr</a></h6>
                                <a href="#" class="card-link">Mark as Done</a>
                                <a href="#" class="card-link">View Prescription</a>
                            </div>
                        </div>

                        <div class="card my-2">
                            <div class="card-body">
                                <h5 class="card-title">10 oct 2020 | 03:30AM</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Clinic: <a href="#">Cleopatra Clinic</a></h6>
                                <h6 class="card-subtitle mb-2 text-muted">Doctor: <a href="#">ahmed nasr</a></h6>
                                <a href="#" class="card-link">Mark as Done</a>
                                <a href="#" class="card-link">View Prescription</a>
                            </div>
                        </div>

                        <div class="card my-2">
                            <div class="card-body">
                                <h5 class="card-title">10 oct 2020 | 03:30AM</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Clinic: <a href="#">Cleopatra Clinic</a></h6>
                                <h6 class="card-subtitle mb-2 text-muted">Doctor: <a href="#">ahmed nasr</a></h6>
                                <a href="#" class="card-link">Mark as Done</a>
                                <a href="#" class="card-link">View Prescription</a>
                            </div>
                        </div>

                        <div class="card my-2">
                            <div class="card-body">
                                <h5 class="card-title">10 oct 2020 | 03:30AM</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Clinic: <a href="#">Cleopatra Clinic</a></h6>
                                <h6 class="card-subtitle mb-2 text-muted">Doctor: <a href="#">ahmed nasr</a></h6>
                                <a href="#" class="card-link">Mark as Done</a>
                                <a href="#" class="card-link">View Prescription</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0">
            <div class="card-body text-center">
                <h2><small>Patient Name-</small>History</h2>
            </div>
        </div>
                            
        <div class="card my-2 p-4 m-2">
            <div class="media">
                <img class="mr-3" src="<?= DIRS::PATH['static-imgs-clinic-logo'];?>" alt="Generic placeholder image">
                <div class="media-body">
                    <ul class="list-group list-group-flush text-left"> <!-- From table user and profile -->
                            <li class="list-group-item">
                            <h5 class="card-subtitle mb-2 text-muted">Clinic: <a href="#">Cleopatra Clinic</a></h5><!-- link to this clinic --></li>
                            <li class="list-group-item">
                            <h6 class="card-title mb-2 text-muted">Date: <a href="#">10 oct 2020 | 03:30AM</a></h6></li>
                            <li class="list-group-item">
                            <h6 class="card-subtitle mb-2 text-muted">Doctor: <a href="#">ahmed nasr</a></h6> <!-- link to this Doctor profile --></li>
                            <li class="list-group-item">
                            <h6 class="card-subtitle mb-2 text-muted">Patient: <a href="#">nasr ahmed</a></h6> <!-- link to this patient profile --></li>
                    </ul>
                </div>
            </div><hr>
            <h4 class="card-subtitle mb-2 text-muted pt-4 pl-1">Discription:</a></h4>
            <h5 class="pl-5">this is discription of prescription</h5>
        </div>

        <div class="card my-2 p-4 m-2">
            <div class="media">
                <img class="mr-3" src="<?= DIRS::PATH['static-imgs-clinic-logo'];?>" alt="Generic placeholder image">
                <div class="media-body">
                    <ul class="list-group list-group-flush text-left"> <!-- From table user and profile -->
                            <li class="list-group-item">
                            <h5 class="card-subtitle mb-2 text-muted">Clinic: <a href="#">Cleopatra Clinic</a></h5><!-- link to this clinic --></li>
                            <li class="list-group-item">
                            <h6 class="card-title mb-2 text-muted">Date: <a href="#">10 oct 2020 | 03:30AM</a></h6></li>
                            <li class="list-group-item">
                            <h6 class="card-subtitle mb-2 text-muted">Doctor: <a href="#">ahmed nasr</a></h6> <!-- link to this Doctor profile --></li>
                            <li class="list-group-item">
                            <h6 class="card-subtitle mb-2 text-muted">Patient: <a href="#">nasr ahmed</a></h6> <!-- link to this patient profile --></li>
                    </ul>
                </div>
            </div><hr>
            <h4 class="card-subtitle mb-2 text-muted pt-4 pl-1">Discription:</a></h4>
            <h5 class="pl-5">this is discription of prescription</h5>
        </div>


        <div class="card my-2 p-4 m-2">
            <div class="media">
                <img class="mr-3" src="<?= DIRS::PATH['static-imgs-clinic-logo'];?>" alt="Generic placeholder image">
                <div class="media-body">
                    <ul class="list-group list-group-flush text-left"> <!-- From table user and profile -->
                            <li class="list-group-item">
                            <h5 class="card-subtitle mb-2 text-muted">Clinic: <a href="#">Cleopatra Clinic</a></h5><!-- link to this clinic --></li>
                            <li class="list-group-item">
                            <h6 class="card-title mb-2 text-muted">Date: <a href="#">10 oct 2020 | 03:30AM</a></h6></li>
                            <li class="list-group-item">
                            <h6 class="card-subtitle mb-2 text-muted">Doctor: <a href="#">ahmed nasr</a></h6> <!-- link to this Doctor profile --></li>
                            <li class="list-group-item">
                            <h6 class="card-subtitle mb-2 text-muted">Patient: <a href="#">nasr ahmed</a></h6> <!-- link to this patient profile --></li>
                    </ul>
                </div>
            </div><hr>
            <h4 class="card-subtitle mb-2 text-muted pt-4 pl-1">Discription:</a></h4>
            <h5 class="pl-5">this is discription of prescription</h5>
        </div>


    </section>
</div>
</div>