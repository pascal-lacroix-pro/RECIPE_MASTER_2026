<?php

namespace App\Models\IngredientsModel;

use \PDO;

function findAll(PDO $conn)
{
    $sql = "SELECT *
            FROM ingredients
            ORDER BY name ASC;";
    $rs = $conn->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findOneById(PDO $conn, int $id)
{
    $sql = "SELECT *
            FROM ingredients
            WHERE id = :id";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(PDO::FETCH_ASSOC);
}
