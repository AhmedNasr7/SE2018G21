<?php

/**
 * ### This page is dr controller 
 * domain_name.com/dr.php?v=view&id=5 will show dr profile of id 5 ... -- Get request with doctor id
 * domain_name.com/dr.php?v=edit will show dr profile -- POST request with dr id 
 */


require_once './init.php';



$page =  $_GET['v'] ? $_GET['v'] : 'view';

if($page == 'edit'):

    require_once DIRS::PATH['views-dr-edit-profile'];

else :
    /** else $page == view */

    require_once DIRS::PATH['views-dr-profile'];

endif;
