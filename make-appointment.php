<?php

require_once './init.php';


// Get all Drs

$stmt = DB::runQuery('SELECT users.* FROM `users` WHERE acc_type = 1');

if($stmt){
    $drs = $stmt->fetchAll();
}

$clinics = Clinic::getAll();



?>
     
     <div class="container mt-5 pt-5">
        <form action="<?= DIRS::URL['appointment-book'] ?>" method="POST">
                <div class="modal-body">

                    <input type="hidden" name="pat_id" value="<?= $_SESSION['loggedinUser']->id ?>">

                    <!-- drs -->
                    <div class="form-group">
                        <label> Select Dr </label>
                        <select name="dr_id" class="form-control">
                            <?php
                                foreach($drs as $dr):
                                    ?>
                                <option value="<?= $dr['id'] ?>"><?= $dr['username'] ?></option>
                            <?php
                                endforeach;
                                ?>
                        </select>
                    </div>


                    <!-- Clinics -->
                    <div class="form-group">
                        <label> Select Clinic </label>
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

<?php require_once DIRS::PATH['views-layout-footer']; ?>