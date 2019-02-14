<?php

/**
 * NOTS
 * $_SESSION['loggedinUser'] an object of User model that contain current loggedin user data from user table there is field called acc_type
 * acc_type = 0 -> Patient
 * acc_type = 1 -> Dr
 * 
 * for gender in profile table 0 => female  || 1 => male
 * 
 */



require_once './init.php';


?>

<div class="container-fluid px-0">
    <?php
        require_once DIRS::PATH['views-home'];
    ?>
</div>


<?php
require_once DIRS::PATH['views-layout-footer'];
?>