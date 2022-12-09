<?php

require_once __dir__.'/../Components/v1/Home/HomeRoute.php';
require_once __dir__.'/../Components/v1/List/ListRoute.php';
require_once __dir__.'/../Components/v1/Task/TaskRoute.php';

//*	RUTAS errores
//*	*****************************************************************************
Flight::map('notFound', function(){Flight::json(["No encontrado"],404);});
//Flight::map('error', function(Exception $ex){Flight::json(["Excepción no controlado"],500);});