<?php

function getPosts($connect, $variable)
{
    switch ($variable) {
        case 'user':
            $sql = "SELECT * FROM users";

            // $result = $connect->query($sql); //->fetchArray(SQLITE3_ASSOC);
            $result = $connect->query($sql);
            $data = array();
            while ($res = $result->fetchArray(1)) {
                array_push($data, $res);
            }
            $connect->close();
            $res = json_encode($data);
            print_r($res);
            break;
        case 'car':
            $sql = "SELECT * FROM cars";

            $result = $connect->query($sql); //->fetchArray(SQLITE3_ASSOC);

            $data = array();
            while ($res = $result->fetchArray(1)) {
                array_push($data, $res);
            }
            $connect->close();
            $res = json_encode($data);
            print_r($res);
            break;
        default:
            # code...
            break;
    }
}

function getPost($connect, $id, $variable)
{
    switch ($variable) {

        case 'user':
            $sql = "SELECT * FROM users WHERE `id` = '$id'";
            $result = $connect->query($sql);

            $res = $result->fetchArray(1);
            $connect->close();
            if ($res == 0) {
                http_response_code(404);
                $mes = [
                    "status" => false,
                    "message" => "Post not found"
                ];
                print_r($mes);
            } else {
                $data = json_encode($res);
                print_r($data);
            }
            break;
        case 'car':
            $sql = "SELECT * FROM cars WHERE users_id = $id";
            $result = $connect->query($sql);

            $data = array();
            while ($res = $result->fetchArray(1)) {
                array_push($data, $res);
            }

            $connect->close();
            if ($data == 0) {
                http_response_code(404);
                $mes = [
                    "status" => false,
                    "message" => "Post not found"
                ];
                print_r($mes);
            } else {
                $res = json_encode($data);
                print_r($res);
            }
            break;
        default:
            echo 'error';
            break;
    }
}

function addPost($connect, $data, $variable)
{
    switch ($variable) {
        case 'user':
            $name = $data['name'];
            $description = $data['description'];
            $surname = $data['surname'];

            $sql = "INSERT INTO users ( name, surname, description)
                        VALUES ('$name','$surname','$description')";
            $idSql = "SELECT MAX(id) as id FROM users LIMIT 1;";
            $connect->query($sql);
            $connect->close();

            http_response_code(201);

            $num = $connect->query($idSql);
            $res = [
                "status" => true,
                "user_id" => "$num"
            ];
            $connect->close();

            print_r($res);
            break;
        case 'car':
            $carName = $data['carName'];
            $users_id = $data['users_id'];

            $sql = "INSERT INTO cars ( users_id, carName)
                        VALUES ('$users_id','$carName')";
            $idSql = "SELECT MAX(id) as id FROM cars LIMIT 1;";
            $connect->query($sql);
            $connect->close();

            http_response_code(201);
            $num = $connect->query($idSql);
            $res = [
                "status" => true,
                "user_id" => "$num"
            ];
            $connect->close();

            print_r($res);
            break;
        default:
            echo 'error';
            break;
    }
}

function deletePost($connect, $id, $variable)
{
    switch ($variable) {
        case 'user':
            $sql = "DELETE FROM `users` WHERE `users`.`id` = '$id'";
            $connect->query($sql);
            $connect->close();
            http_response_code(200);
            $mes = [
                "status" => true,
                "message" => "Post '$id' is delete"
            ];
            print_r($mes);
            break;
        case 'car':
            $sql = "DELETE FROM `cars` WHERE `cars`.`id` = '$id'";
            $connect->query($sql);
            $connect->close();
            http_response_code(200);
            $mes = [
                "status" => true,
                "message" => "Post '$id' is delete"
            ];
            print_r($mes);
            break;
        default:
            echo 'error';
            break;
    }
}
