<?php

require_once './conect.php';

$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$surname = $_POST['surname'];

$sql = "UPDATE users SET name = '$name', surname = '$surname', description = '$description' WHERE users . id = '$id'";

$db->query($sql);
$db->close();

header('Location: /');
