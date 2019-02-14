<?php

require_once './init.inc.php';

$view = isset($_GET['v']) ? $_GET['v'] : 'view';


require_once './layout/header.inc.php';
require_once './layout/nav.inc.php';

?>

<?php

if ($view == 'view'):
    require_once DIRS['grades-view'];
elseif($view == 'add'):
    require_once DIRS['grade-add'];
elseif($view == 'edit'):
    require_once DIRS['grade-edit'];
elseif($view == 'delete'):
    require_once DIRS['grade-delete'];
else:
    header('Location:'.PATH['grades-view']);
endif;

?>


<?php
require_once './layout/footer.inc.php';
?>