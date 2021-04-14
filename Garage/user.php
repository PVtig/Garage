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

$sql = "SELECT * FROM cars WHERE users_id = $users_id";
$dataCar = array();
$car = $db->query($sql);
while ($res = $car->fetchArray(1)) {
    array_push($dataCar, $res);
}
$db->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Person</title>
</head>

<body>
    <h2>Name: <?= $data['name'] ?></h2>
    <h4>Surname: <?= $data['surname'] ?></h4>
    <p>Description: <?= $data['description'] ?></p>

    <form action="./create_car.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <input type="text" name="carName">
        <button type="submit">Add car</button>

    </form>

    <h3>Cars</h3>
    <ul>
        <?php
        foreach ($dataCar as $row => $dataCar) {
        ?>
            <li><?= print_r($dataCar['carName']); ?></li>
        <?php
        }
        ?>
    </ul>
</body>

</html>