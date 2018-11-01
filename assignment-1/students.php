<?php

require_once './init.inc.php';

$view = isset($_GET['v']) ? $_GET['v'] : 'view';


require_once './layout/header.inc.php';
require_once './layout/nav.inc.php';

?>

<?php

if ($view == 'view'):
    require_once DIRS['students-view'];
elseif($view == 'add'):
    require_once DIRS['students-add'];
elseif($view == 'edit'):
    require_once DIRS['students-edit'];
elseif($view == 'delete'):
    require_once DIRS['students-delete'];
else:
    header('Location:'.PATH['student-view']);
endif;

?>


<?php
require_once './layout/footer.inc.php';
?>