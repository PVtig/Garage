<?php
require_once './conect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>users</title>
</head>

<body>
    <?php

    $sql = "SELECT * FROM users";

    $result = $db->query($sql); //->fetchArray(SQLITE3_ASSOC);

    $data = array();
    while ($res = $result->fetchArray(1)) {
        array_push($data, $res);
    }
    $db->close();

    echo "<table border=1>";
    echo "<tr>";
    echo "<td>id</td>";
    echo "<td>Name</td>";
    echo "<td>Surname</td>";
    echo "<td>Description</td>";
    echo "</tr>";
    foreach ($data as $row => $data) {
    ?>
        <tr>
            <td><?= $data['id'] ?></td>
            <td><?= $data['name'] ?></td>
            <td><?= $data['surname'] ?></td>
            <td><?= $data['description'] ?></td>
            <td><a href="./user.php?id=<?= $data['id'] ?>">Viev</a></td>
            <td><a href="./update.php?id=<?= $data['id'] ?>">Update</a></td>
            <td><a style="color: red" href="./delete.php?id=<?= $data['id'] ?>">Delete</a></td>
        </tr>
    <?php
    }
    echo "</table>";
    ?>
    <h3>Add new users</h3>
    <form action="create.php" method="post">
        <p>Name</p>
        <input type="text" name="name">
        <p>Surname</p>
        <input type="text" name="surname">
        <p>Description</p>
        <textarea name="description"></textarea><br> <br>
        <button type="submit">Add new user

</body>

</html>
<?php
