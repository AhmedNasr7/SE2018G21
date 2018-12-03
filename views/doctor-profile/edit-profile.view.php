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
            <h6 class="card-subtitle mb-2 text-muted">This account treats as a Doctor account</h6>
        </div>
    </div>
    
    <div class="card border-0">
        <div class="card-body">
            <form action="./dr.php?v=edit" method="POST"> <!-- User and Profile tables  ||| action to dr.php controller -->
                <div class="form-group">
                    <label class="card-title">First name</label>
                    <input type="text" name="first_name" class="form-control" value="<?= $profile->first_name ?>">
                </div>
                <div class="form-group">
                    <label class="card-title">Last name</label>
                    <input type="text" name="last_name" class="form-control" value="<?= $profile->last_name ?>">
                </div>
                <div class="form-group">
                    <label class="card-title">Address</label>
                    <input type="text" name="address" class="form-control" value="<?= $profile->address ?>">
                </div>
                <div class="form-group">
                    <label class="card-title">Phone</label>
                    <input type="text" name="phone" class="form-control" value="<?= $profile->phone ?>">
                </div>
                <div class="form-group">
                    <label class="card-title">Gender</label>
                    <select name="gender" class="form-control">
                        <option value="1">Male</option>
                        <option value="0">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="card-title">Major</label> <!-- majors table -->
                    <select name="dr_major" class="form-control">
                        <option value="0">طبيب بتنجان</option> <!-- Values = major id -->
                        <option value="1">طبيب عيون</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-info btn-block">Save</button>
            </form>
        </div>
    </div>

</div>