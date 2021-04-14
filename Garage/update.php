<?php

require_once './conect.php';
$users_id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = '$users_id'";

$product = $db->query($sql);
$data = array();
while ($res = $product->fetchArray(1)) {
    array_push($data, $res);
}
foreach ($data as $row => $data) {
    $data['id'];
    $data['name'];
    $data['surname'];
    $data['description'];
}
$db->close();
print_r($data['surname']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>

<body>
    <h3>Update User</h3>
    <form action="./updateConf.php" method="post">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <p>Name</p>
        <input type="text" name="name" value="<?= $data['name'] ?>">
        <p>Surname</p>
        <input type="text" name="surname" value="<?= $data['surname'] ?>">
        <p>Description</p>
        <textarea name="description"><?= $data['description'] ?></textarea>
        <br> <br>
        <button type="submit">Update
</body>

</html>