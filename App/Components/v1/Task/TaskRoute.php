<?php

require_once __DIR__.'/TaskController.php';

$taskController = new TaskController();

//*	RUTAS http://localshot:8081/api/task
//*	*****************************************************************************
Flight::route('GET /api/v1/task'						, array($taskController, 'index'));
Flight::route('GET /api/v1/task/completed'				, array($taskController, 'completed'));
Flight::route('GET /api/v1/task/deleted'				, array($taskController, 'deleted'));
Flight::route('GET /api/v1/task/@id:[0-9]+'				, array($taskController, 'show'));
Flight::route('POST /api/v1/task'						, array($taskController, 'store'));
Flight::route('POST /api/v1/task/completed/@id:[0-9]+'	, array($taskController, 'complete'));
Flight::route('PUT /api/v1/task/@id:[0-9]+'				, array($taskController, 'edit'));
Flight::route('DELETE /api/v1/task/@id:[0-9]+'			, array($taskController, 'delete'));
Flight::route('DELETE /api/v1/task/destroy'				, array($taskController, 'destroy'));
