<?php

require_once __DIR__.'/ListController.php';

$listController = new ListController();

//*	RUTAS http://localshot:8081/api/list
//*	*****************************************************************************
Flight::route('GET /api/v1/list'				,array($listController, 'index'));
Flight::route('GET /api/v1/list/@id:[0-9]+'	,array($listController, 'show'));
Flight::route('POST /api/v1/list'				,array($listController, 'store'));
Flight::route('PUT /api/v1/list/@id:[0-9]+'	,array($listController, 'edit'));
Flight::route('DELETE /api/v1/list/@id:[0-9]+'	,array($listController, 'delete'));
