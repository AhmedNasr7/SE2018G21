<div class="container mt-5">
    <?php
    if(isset($_SESSION['success_updatet'])):
            if($_SESSION['success_updatet']):
    ?>
                <div class="alert alert-success">Updated</div>
    <?php
        unset($_SESSION['success_updatet']);
    endif; endif;
    ?>
    <div class="card border-0">
        <div class="card-body">
            <h5 class="card-title">Public Profile</h5>
            <?php 
            if($_SESSION['loggedinUser']->acc_type == 1){
            ?>
                <h6 class="card-subtitle mb-2 text-muted">This account treats as a Doctor account</h6>
            <?php
            }elseif ($_SESSION['loggedinUser']->acc_type == 0) {
            ?>
                <h6 class="card-subtitle mb-2 text-muted">This account treats as a Patient account</h6>
            <?php
            }
            ?>
        </div>
    </div>
    
    <div class="card border-0">
        <div class="card-body">
            <form action="./dr.php?v=edit" method="POST"> <!-- User and Profile tables  ||| action to dr.php controller -->
                <div class="form-group">
                    <label class="card-title">First name</label>
                    <input type="text" name="first_name" class="form-control" value="<?= $profile->first_name ?>" required>
                </div>
                <div class="form-group">
                    <label class="card-title">Last name</label>
                    <input type="text" name="last_name" class="form-control" value="<?= $profile->last_name ?>" required>
                </div>
                <div class="form-group">
                    <label class="card-title">Address</label>
                    <input type="text" name="address" class="form-control" value="<?= $profile->address ?>" required>
                </div>
                <div class="form-group">
                    <label class="card-title">Phone</label>
                    <input type="text" name="phone" class="form-control" value="<?= $profile->phone ?>" required>
                </div>
                <div class="form-group">
                    <label class="card-title">Gender</label>
                    <select name="gender" class="form-control" required>
                        <option value="1">Male</option>
                        <option value="0">Female</option>
                    </select>
                </div>
<<<<<<< HEAD:views/edit-profile/edit-profile.view.php
                <?php 
                if($_SESSION['loggedinUser']->acc_type == 1):
                ?>
                    <div class="form-group">
                        <label class="card-title">Major</label> <!-- majors table -->
                        <select name="dr_major" class="form-control">
                            <option value="0">طبيب بتنجان</option> <!-- Values = major id -->
                            <option value="1">طبيب عيون</option>
                        </select>
                    </div>
                <?php
                endif;?>
=======
                <div class="form-group">
                    <label class="card-title">Major</label> <!-- majors table -->
                    <select name="dr_major" class="form-control" required>
                        <option value="0">طبيب بتنجان</option> <!-- Values = major id -->
                        <option value="1">طبيب عيون</option>
                    </select>
                </div>
>>>>>>> f34f4cdc1ba8f6a383f8cb527270fa8dc7ddc596:views/doctor-profile/edit-profile.view.php
                <button type="submit" class="btn btn-info btn-block">Save</button>
            </form>
        </div>
    </div>

</div>