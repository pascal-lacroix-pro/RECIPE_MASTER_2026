<?php

namespace App\Models\UsersModel;

use \PDO;

function findAll(PDO $conn, int $limit = 9)
{
    $sql = "SELECT *
            FROM users
            ORDER BY created_at DESC
            LIMIT :limit;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(":limit", $limit, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findOneByRand(PDO $conn)
{
    $sql = "SELECT *
            FROM users
            ORDER BY RAND()
            LIMIT 1;";
    $rs = $conn->query($sql);
    return $rs->fetch(PDO::FETCH_ASSOC);
}

function findOneById(PDO $conn, int $id)
{
    $sql = "SELECT *
            FROM users
            WHERE id= :id;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(":id", $id, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(PDO::FETCH_ASSOC);
}
