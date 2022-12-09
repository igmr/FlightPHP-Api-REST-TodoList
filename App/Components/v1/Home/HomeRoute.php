<?php

require_once __DIR__.'/HomeController.php';

$homeController = new HomeController();

//*	RUTAS http://localshot:8081/
//*	RUTAS http://localshot:8081/api
//*	*****************************************************************************
Flight::route('/', array($homeController, 'index'));
Flight::route('/api/', array($homeController, 'index'));
Flight::route('/api/v1', array($homeController, 'index'));