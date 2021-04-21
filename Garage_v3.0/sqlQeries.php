<?php

const SQL_GET_USERS = '
    SELECT * FROM users
';

const SQL_GET_CARS = '
    SELECT * FROM cars
';

const SQL_GET_USER = '
    SELECT * FROM users WHERE id = ?
';

const SQL_GET_CAR = '
    SELECT * FROM cars WHERE id = ?
';

const SQL_INSERT_USER = '
    INSERT INTO users ( name, surname, description) VALUES (:name, :surname, :description)
';

const SQL_INSERT_CAR = '
    INSERT INTO cars ( users_id, carName) VALUES (:users_id, :carName)
';

const SQL_DELETE_USER = '
DELETE FROM users WHERE users . id = ?
';

const SQL_DELETE_CAR = '
DELETE FROM cars WHERE id = ?
';

const SQL_ID_LAST = '
    INSERT INTO users ( users_id, carName) VALUES (?, ?)
';


const SQL_UPDATE_USER_BY_ID = '
    UPDATE users SET
        name = :name,
        surname = :surname,
        description = :description
    WHERE
        id = :id    
';

const SQL_UPDATE_CAR_BY_ID = '
    UPDATE cars SET
        users_id = :users_id,
        carName = :carName,
    WHERE
        id = :id    
';
