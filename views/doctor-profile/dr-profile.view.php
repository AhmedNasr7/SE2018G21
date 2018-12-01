<div class="container pt-5">

<div class="row justify-content-around">
    <section id="DR-PROFILE-INFO" class="col-10 col-md-10 col-lg-5 col-xl-5 border-right">
            <div class="row py-md-3">
                <div class="col-12 col-lg-12 pb-3 text-center">
                    <div class="img-thumbnail border-0">
                        <img class="w-25 my-5 mx-auto d-block shadow-sm rounded-circle" src="<?= DIRS::PATH['static-imgs-dr-avatar'] ?>" alt="Dr-Avatar">
                    </div>
                    <h2><small>Dr-</small>Full Name</h2>
                    <div class="btn-group">
                        <a href="#" class="btn btn-info"> Edit Public Info </a> <!-- link to edit profile page "Anss task"-->
                        <a href="#" class="btn btn-primary"> Add/Join Clinic </a> <!-- link to clinics page "Ahmed nasr task"-->
                    </div>
                </div>

                <div class="col-12 col-lg-12">
                    <ul class="list-group list-group-flush text-center"> <!-- From table user and profile -->
                        <li class="list-group-item">@username</li>
                        <li class="list-group-item">0101632993</li>
                        <li class="list-group-item">21 sep 1997</li>
                        <li class="list-group-item">male</li>
                        <li class="list-group-item">Department hena</li> <!-- From table Majors """ keep it static now """ -->
                    </ul>
                </div>
                <div class="col-12 col-lg-12 mt-2">
                    <div class="card-body">
                        <h5 class="card-title">Your Clinics</h5> <!-- From dr-clinics and clinics tables -->
                        <h6 class="card-subtitle mb-2 text-muted">You can add or join or delete clinics</h6>
                    </div>
                    <div class="row">
                        <div class="col-6 p-2">
                            <ul class="list-group text-center">
                                <a href="#" class="list-group-item rounded border-0  mb-2 text-white" style="background-color:#2ecc71;">
                                    Clinic A Title
                                </a>
                                <a href="#" class="list-group-item rounded border-0  mb-2 text-white" style="background-color:#e74c3c;">
                                    Clinic B Title
                                </a>
                            </ul>
                        </div>
                        <div class="col-6 p-2">
                            <ul class="list-group text-center">
                                <a href="#" class="list-group-item rounded border-0 mb-2 text-white" style="background-color:#1abc9c;">
                                    Clinic C Title
                                </a>
                                <a href="#" class="list-group-item rounded border-0  mb-2 text-white" style="background-color:#9b59b6;">
                                    Clinic D Title
                                </a>
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
        
        <div class="card my-2">
            <div class="card-body">
                <a href="#" ><h5 class="card-title">10 oct 2020 | 03:30AM</h5></a> <!-- link to appointment views for this appointment -->
                <h6 class="card-subtitle mb-2 text-muted">Patient: <a href="#">ahmed nasr</a></h6> <!-- link to this patient profile -->
                <a href="#" class="card-link">Mark as Done</a> <!-- future function ajax to set appointment as done -->
                <a href="#" class="card-link">Write Prescription</a> <!-- link to prescription of ""this patient"" -->
            </div>
        </div>

        <div class="card my-2">
            <div class="card-body">
                <h5 class="card-title">10 oct 2020 | 03:30AM</h5>
                <h6 class="card-subtitle mb-2 text-muted">Patient: <a href="#">ahmed nasr</a></h6>
                <a href="#" class="card-link">Mark as Done</a>
                <a href="#" class="card-link">Write Prescription</a>
            </div>
        </div>

        <div class="card my-2">
            <div class="card-body">
                <h5 class="card-title">10 oct 2020 | 03:30AM</h5>
                <h6 class="card-subtitle mb-2 text-muted">Patient: <a href="#">ahmed nasr</a></h6>
                <a href="#" class="card-link">Mark as Done</a>
                <a href="#" class="card-link">Write Prescription</a>
            </div>
        </div>

        <div class="card my-2">
            <div class="card-body">
                <h5 class="card-title">10 oct 2020 | 03:30AM</h5>
                <h6 class="card-subtitle mb-2 text-muted">Patient: <a href="#">ahmed nasr</a></h6>
                <a href="#" class="card-link">Mark as Done</a>
                <a href="#" class="card-link">Write Prescription</a>
            </div>
        </div>

        <div class="card my-2">
            <div class="card-body">
                <h5 class="card-title">10 oct 2020 | 03:30AM</h5>
                <h6 class="card-subtitle mb-2 text-muted">Patient: <a href="#">ahmed nasr</a></h6>
                <a href="#" class="card-link">Mark as Done</a>
                <a href="#" class="card-link">Write Prescription</a>
            </div>
        </div>


        <div class="card my-2">
            <div class="card-body">
                <h5 class="card-title">10 oct 2020 | 03:30AM</h5>
                <h6 class="card-subtitle mb-2 text-muted">Patient: <a href="#">ahmed nasr</a></h6>
                <a href="#" class="card-link">Mark as Done</a>
                <a href="#" class="card-link">Write Prescription</a>
            </div>
        </div>


        <div class="card my-2">
            <div class="card-body">
                <h5 class="card-title">10 oct 2020 | 03:30AM</h5>
                <h6 class="card-subtitle mb-2 text-muted">Patient: <a href="#">ahmed nasr</a></h6>
                <a href="#" class="card-link">Mark as Done</a>
                <a href="#" class="card-link">Write Prescription</a>
            </div>
        </div>
        
    </section>

</div>
</div>