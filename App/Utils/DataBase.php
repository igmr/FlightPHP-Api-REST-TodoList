<?php

//*	*****************************************************************************
//*	Datos de configuración														*
//*	*****************************************************************************
$host = Flight::get('db.host');
$db = Flight::get('db.database');
$user = Flight::get('db.user');
$pass = Flight::get('db.password');

$port = 5432;

//*	*****************************************************************************
//*	Cadena de conexión hacia base de datos										*
//*	*****************************************************************************
Flight::register('db', 'PDO', array('mysql:host='.$host.';port='.$port.';dbname='.$db, $user, $pass));

