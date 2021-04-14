<?php

require_once './conect.php';

$name = $_POST['name'];
$description = $_POST['description'];
$surname = $_POST['surname'];

$sql = "INSERT INTO users ( name, surname, description)
            VALUES ('$name','$surname','$description')";

$db->query($sql);
$db->close();

header('Location: /');
