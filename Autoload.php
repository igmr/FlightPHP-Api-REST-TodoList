<?php
//* Load libraries
require_once __DIR__.'/vendor/autoload.php';

//* Setting Dotenv
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
