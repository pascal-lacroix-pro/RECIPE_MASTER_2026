<?php

namespace App\Models\CategoriesModel;

use \PDO;

function findAll(PDO $conn)
{
    $sql = "SELECT *
            FROM types_of_recipes
            ORDER BY name ASC;";
    $rs = $conn->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findOneById(PDO $conn, int $id)
{
    $sql = "SELECT *
            FROM types_of_recipes
            WHERE id = :id";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(PDO::FETCH_ASSOC);
}
