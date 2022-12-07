<?php

//*	*****************************************************************************
//*	Carga de archivos														*
//*	*****************************************************************************

require_once __DIR__.'/Autoload.php';
require_once __DIR__.'/App/Config/Config.php';
require_once __DIR__.'/App/Config/DataBase.php';
require_once __DIR__.'/App/Services/BaseService.php';
require_once __DIR__.'/Routes.php';

Flight::start();
