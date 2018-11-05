<?php

require_once './init.inc.php';

$view = isset($_GET['v']) ? $_GET['v'] : 'view';


require_once './layout/header.inc.php';
require_once './layout/nav.inc.php';

?>

<?php

if ($view == 'view'):
    require_once DIRS['courses-view'];
elseif($view == 'add'):
    require_once DIRS['course-add'];
elseif($view == 'edit'):
    require_once DIRS['course-edit'];
elseif($view == 'delete'):
    require_once DIRS['course-delete'];
elseif($view == 'search'):
    require_once DIRS['course-search'];
else:
    header('Location:'.PATH['courses-view']);
endif;

?>


<?php
require_once './layout/footer.inc.php';
?>