<div class="container pt-5">

<div class="card mt-5 rounded shadow-sm">

    <div class="card-body">
        <h5 class="card-title"><?= $clinic->name ?></h5>
        <p class="card-text text-muted">Address: <?= $clinic->address ?></p>
        <p class="card-text text-muted">Description: <?= $clinic->description ?></p>

        <?php
            if(isset($_SESSION['loggedinUser'])):
        ?>
            <?php
                if($_SESSION['loggedinUser']->acc_type == 1):
            ?>
                <?php
                    if( in_array( $clinic->id , $loggedUserClincsIds ) ):
                ?>
                    <a class="btn btn-primary disabled text-white" disabled>Joined</a>
                    <form action="<?= DIRS::URL['clinic-delete'] ?>" method="POST" class="d-inline">
                        <input type="hidden" name="clinic_id" value="<?= $clinic->id ?>">
                        <button type="submitt" class="btn btn-danger">Delete</button>
                    </form>
                <?php
                    else:
                        ?>
                    <form action="<?= DIRS::URL['clinic-join'] ?>" method="POST" class="d-inline">
                        <input type="hidden" name="clinic_id" value="<?= $clinic->id ?>">
                        <button type="submitt" class="btn btn-primary">Join</button>
                    </form>
                <?php
                    endif;
                    ?>
            <?php
                endif;
            ?>
        <?php
            endif;
        ?>
    </div>

</div>

</div>