<?php

//*	*****************************************************************************
//*	Datos de configuración														*
//*	*****************************************************************************
$log_errors = (bool) $_ENV['LOG_ERRORS'];
$case_sensitive = (bool) $_ENV['CASE_SENSITIVE'];
$base_url = $_ENV['BASE_URL'];
$base_api = $base_url.'/api/';
$host = $_ENV['DB_HOST'];
$db = $_ENV['DB_DATABASE'];
$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'];

//*	*****************************************************************************
//*	Configuración general														*
//*	*****************************************************************************
Flight::set('flight.log_errors', $log_errors);
Flight::set('flight.case_sensitive', $case_sensitive);
Flight::set('flight.base_url', $base_url);

Flight::set('base_api', $base_api);

//*	*****************************************************************************
//*	Configuración de base de datos												*
//*	*****************************************************************************
Flight::set('db.host', $host);
Flight::set('db.database', $db);
Flight::set('db.user', $user);
Flight::set('db.password', $password);
