<?php

require_once './conect.php';
$id = $_GET['id'];

$sql = "DELETE FROM users WHERE users . id = '$id'";

$db->query($sql);
$db->close();
header('Location: /');
