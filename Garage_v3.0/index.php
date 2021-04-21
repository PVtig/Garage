<?php

header('Access-Control-Allow-Origin: *');
header('Content-type: json/application');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Credentials: true');


require_once './conect.php';
require_once './sqlQeries.php';
require './functions.php';
require './classes.php';


$method = $_SERVER['REQUEST_METHOD'];
$get = $_GET['route'];
$params = explode('/', $get);

$type = $params[1];
$id = $params[2];
$update = $params[3];

$class = new Crud();


/* Basic 'try' 'PDO' filling its choice of logic 
    depending on the type of method */
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    switch ($method) {
        case 'GET':

            $class->get($pdo, $type, $id);
            break;

        case 'POST':

            if ($update == 'update') {
                $class->update($pdo, $id, $_POST, $type);
            } else {
                $class->add($pdo, $data, $type);
            }
            break;

        case 'DELETE':

            $class->delete($pdo, $id, $type);
            break;

        default:
            echo 'error';
            break;
    }
} catch (PDOException $e) {
    exit($e->getMessage());
}
