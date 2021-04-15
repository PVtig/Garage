<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');
header('Content-type: json/application');

require_once './conect.php';
require './functions.php';


$method = $_SERVER['REQUEST_METHOD'];
$get = $_GET['route'];
$params = explode('/', $get);

$type = $params[1];
$id = $params[2];

switch ($method) {
    case 'GET':
        if (isset($id)) {
            getPost($db, $id, $type);
        } else {
            getPosts($db, $type);
        }
        break;

    case 'POST':
        addPost($db, $_POST, $type);
        break;

    case 'DELETE':
        if (isset($id)) {
            deletePost($db, $id, $type);
        }

        break;
    default:
        echo 'error';
        break;
}
