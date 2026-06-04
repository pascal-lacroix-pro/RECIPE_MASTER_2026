<?php

namespace App\Models\RecipesModel;

use \PDO;

function findOneByRand(PDO $conn): array
{
    $sql = "SELECT *
            FROM recipes
            ORDER BY RAND()
            LIMIT 1;";
    $rs = $conn->query($sql);
    return $rs->fetch(PDO::FETCH_ASSOC);
}

function findAll(PDO $conn, int $limit = 9)
{
    $sql = "SELECT *
            FROM recipes
            ORDER BY created_at DESC
            LIMIT :limit;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(":limit", $limit, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findAllPopulars(PDO $conn)
{
    $sql = "SELECT *
            FROM recipes
            ORDER BY created_at DESC
            LIMIT 3;";
    $rs = $conn->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findAllByUserId(PDO $conn, int $userID)
{
    $sql = "SELECT *
            FROM recipes
            WHERE user_id = :userID
            ORDER BY created_at DESC
            LIMIT 3;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':userID', $userID, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findAllByTypeId(PDO $conn, int $typeId)
{
    $sql = "SELECT *
            FROM recipes
            WHERE type_id = :typeId
            ORDER BY created_at DESC;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':typeId', $typeId, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findAllByIngredientId(PDO $conn, int $ingredientId)
{
    $sql = "SELECT recipes.*
            FROM recipes
            JOIN recipes_has_ingredients ON recipes.id = recipes_has_ingredients.recipe_id
            WHERE recipes_has_ingredients.ingredient_id = :ingredientId
            ORDER BY recipes.created_at DESC;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':ingredientId', $ingredientId, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findOneById(PDO $conn, int $id)
{
    $sql = "SELECT *
            FROM recipes
            WHERE id = :id";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(PDO::FETCH_ASSOC);
}
