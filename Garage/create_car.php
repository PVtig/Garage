<?php

require_once './conect.php';

$id = $_POST['id'];
$carName = $_POST['carName'];

$sql = "INSERT INTO cars ( users_id, carName)
            VALUES ('$id','$carName');";

$db->query($sql);
$db->close();
header('Location: /user.php?id=' . $id);
