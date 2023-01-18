<?php

//*	*****************************************************************************
//*	Datos de configuración														*
//*	*****************************************************************************
$host = Flight::get('db.host');
$db = Flight::get('db.database');
$user = Flight::get('db.user');
$pass = Flight::get('db.password');
$port = Flight::get('db.port');

//*	*****************************************************************************
//*	Cadena de conexión hacia base de datos										*
//*	*****************************************************************************
Flight::register('db', 'PDO', array('mysql:host='.$host.';port='.$port.';dbname='.$db.';charset=utf8mb4', $user, $pass));

