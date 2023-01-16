<?php

//*	*****************************************************************************
//*	Carga de archivos														*
//*	*****************************************************************************

require_once __dir__.'/Autoload.php';
require_once __dir__.'/App/Config/Config.php';
require_once __dir__.'/App/Config/Routes.php';
require_once __DIR__.'/App/Config/Cors.php';

Flight::start();
