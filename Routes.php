<?php

require_once __DIR__.'/App/Models/ListModel.php';
require_once __DIR__.'/App/Models/TaskModel.php';

require_once __DIR__.'/App/Services/HomeService.php';

require_once __DIR__.'/App/Services/ListService.php';
require_once __DIR__.'/App/Services/TaskService.php';

$homeService = new HomeService();
$listService = new ListService();
$taskService = new TaskService();

//*	RUTAS http://localshot:8081/
//*	RUTAS http://localshot:8081/api
//*	*****************************************************************************
Flight::route('/', array($homeService, 'index'));
Flight::route('/api', array($homeService, 'index'));

//*	RUTAS http://localshot:8081/api/list
//*	*****************************************************************************
Flight::route('GET /api/list'				,array($listService, 'index'));
Flight::route('GET /api/list/@id:[0-9]+'	,array($listService, 'show'));
Flight::route('POST /api/list'				,array($listService, 'store'));
Flight::route('PUT /api/list/@id:[0-9]+'	,array($listService, 'edit'));
Flight::route('DELETE /api/list/@id:[0-9]+'	,array($listService, 'delete'));

//*	RUTAS http://localshot:8081/api/task
//*	*****************************************************************************
Flight::route('GET /api/task'						,array($taskService, 'index'));
Flight::route('GET /api/task/completed'				,array($taskService, 'completed'));
Flight::route('GET /api/task/deleted'				,array($taskService, 'deleted'));
Flight::route('GET /api/task/@id:[0-9]+'			,array($taskService, 'show'));
Flight::route('POST /api/task'						,array($taskService, 'store'));
Flight::route('POST /api/task/completed/@id:[0-9]+'	,array($taskService, 'complete'));
Flight::route('PUT /api/task/@id:[0-9]+'			,array($taskService, 'edit'));
Flight::route('DELETE /api/task/@id:[0-9]+'			,array($taskService, 'delete'));
Flight::route('DELETE /api/task/destroy'			,array($taskService, 'destroy'));
//*	RUTAS errores
//*	*****************************************************************************
//Flight::map('notFound', function(){Flight::json(["No encontrado"],404);});
//Flight::map('error', function(Exception $ex){Flight::json(["Excepción no controlado"],500);});
