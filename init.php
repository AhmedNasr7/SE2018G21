<?php

require_once './config.php';

/******************************************* */

DB::connect();
session_start();
/****************************************** */

require_once DIRS::PATH['views-layout-header'];
require_once DIRS::PATH['views-layout-nav'];