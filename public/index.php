<?php

require __DIR__ . '/../vendor/autoload.php';

use App\models\Connection;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__. '/..');
$dotenv->load();

$db = Connection::getInstance();
print_r($db);

exit;