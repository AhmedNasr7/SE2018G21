<div class="container pt-5">

<div class="row justify-content-around">
    <section id="DR-PROFILE-INFO" class="col-10 col-md-10 col-lg-5 col-xl-5 border-right">
            <div class="row py-md-3">
                <div class="col-12 col-lg-12 pb-3 text-center">
                    <div class="img-thumbnail border-0">
                        <img class="w-25 my-5 mx-auto d-block shadow-sm rounded-circle" src="<?= DIRS::PATH['static-imgs-dr-avatar'] ?>" alt="Dr-Avatar">
                    </div>
                    <h2><small>Dr-</small><?= $profile->first_name . " " . $profile->last_name  ?></h2>
                    <div class="btn-group">
                        <a href="./dr.php?v=edit" class="btn btn-info"> Edit Public Info </a> <!-- link to edit profile page "Anss task"-->
                        <a href="#" class="btn btn-primary"> Add/Join Clinic </a> <!-- link to clinics page "Ahmed nasr task"-->
                    </div>
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
                                    <a href="#" class="list-group-item rounded border-0  mb-2 text-white" style="background-color:#2ecc71;">
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
                <div class="btn btn-info">Make appointment</div> <!-- link to making appointment "Nasr task" -->
            </div>
        </div>
        
        <?php
            foreach($drAppointments as $appointment):
        ?>

        <div class="card my-2">
            <div class="card-body">
                <a href="#" ><h5 class="card-title"><?= $appointment['date'] ?></h5></a> <!-- link to appointment views for this appointment -->
                <h6 class="card-subtitle mb-2 text-muted">Patient: <a href="#"><?php $pat = new User($appointment['pat_id']); echo $pat->username?></a></h6> <!-- link to this patient profile -->
                <a href="#" class="card-link">Write Prescription</a> <!-- link to prescription of ""this patient"" -->
            </div>
        </div>

        <?php
            endforeach;
        ?>

    </section>

</div>
</div>