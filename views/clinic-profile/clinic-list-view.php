<div class="container pt-5">

<?php
    if( isset($_SESSION['loggedinUser']) && $_SESSION['loggedinUser']->acc_type == 1):
?>
        <div class="mt-5"></div>
        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#createClinic">
            Create your own Clinic
        </button>

        <!-- Create Clinic Modal -->
        <div class="modal fade" id="createClinic" tabindex="-1" role="dialog" aria-labelledby="createClinicModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createClinicModal">new clinic</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= DIRS::URL['clinic-create'] ?>" method="POST">
                    <div class="modal-body">
                            <input type="hidden" name="dr_id" value="<?= $_SESSION['loggedinUser']->id ?>">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" placeholder="phone">
                        </div>
                        <div class="form-group">
                            <input type="text" name="address" class="form-control" placeholder="address">
                        </div>
                        <div class="form-group">
                            <textarea name="desc" class="form-control" placeholder="Description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

<?php
    endif;
?>

<?php
    foreach($clinics as $clinic):
?>
    <div class="card mt-5 rounded shadow-sm">

        <div class="card-body">
            <h5 class="card-title"> <a href="<?= DIRS::URL['clinic-profile'].'&clinicid='.$clinic['id']; ?>"><?= $clinic['name'] ?></a> </h5>
            <p class="card-text text-muted">Address: <?= $clinic['address'] ?></p>
            <p class="card-text text-muted">Description: <?= $clinic['description'] ?></p>

            <?php
                if(isset($_SESSION['loggedinUser'])):
            ?>
                <?php
                    if($_SESSION['loggedinUser']->acc_type == 1):
                ?>
                    <?php
                        if( in_array( $clinic['id'] , $loggedUserClincsIds ) ):
                    ?>
                        <a class="btn btn-primary disabled text-white" disabled>Joined</a>
                        <form action="<?= DIRS::URL['clinic-delete'] ?>" method="POST" class="d-inline">
                            <input type="hidden" name="clinic_id" value="<?= $clinic['id'] ?>">
                            <button type="submitt" class="btn btn-danger">Delete</button>
                        </form>
                    <?php
                        else:
                    ?>
                        <form action="<?= DIRS::URL['clinic-join'] ?>" method="POST">
                            <input type="hidden" name="clinic_id" value="<?= $clinic['id'] ?>">
                            <button type="submitt" class="btn btn-primary">Join</button>
                        </form>
                    <?php
                        endif;
                    ?>

                <?php
                    elseif($_SESSION['loggedinUser']->acc_type == 0):
                ?>
                    <a href="#" class="btn btn-primary">Make Appointment</a>
                <?php
                    endif;
                ?>
            <?php
                endif;
            ?>
        </div>

    </div>
<?php
    endforeach;
?>

</div>
