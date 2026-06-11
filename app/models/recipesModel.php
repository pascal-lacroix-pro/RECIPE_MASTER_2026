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
    $sql = "SELECT recipes.*, COUNT(c.id) AS comments_count
            FROM recipes
            LEFT JOIN comments c ON recipes.id = c.recipe_id
            GROUP BY recipes.id
            ORDER BY recipes.created_at DESC
            LIMIT :limit;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(":limit", $limit, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findAllPopulars(PDO $conn)
{
    $sql = "SELECT recipes.*, COUNT(c.id) AS comments_count
            FROM recipes
            LEFT JOIN comments c ON recipes.id = c.recipe_id
            GROUP BY recipes.id
            ORDER BY recipes.created_at DESC
            LIMIT 3;";
    $rs = $conn->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findAllByUserId(PDO $conn, int $userID)
{
    $sql = "SELECT recipes.*, COUNT(c.id) AS comments_count
            FROM recipes
            LEFT JOIN comments c ON recipes.id = c.recipe_id
            WHERE recipes.user_id = :userID
            GROUP BY recipes.id
            ORDER BY recipes.created_at DESC
            LIMIT 3;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':userID', $userID, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findAllByTypeId(PDO $conn, int $typeId)
{
    $sql = "SELECT recipes.*, COUNT(c.id) AS comments_count
            FROM recipes
            LEFT JOIN comments c ON recipes.id = c.recipe_id
            WHERE recipes.type_id = :typeId
            GROUP BY recipes.id
            ORDER BY recipes.created_at DESC;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':typeId', $typeId, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findAllByIngredientId(PDO $conn, int $ingredientId)
{
    $sql = "SELECT recipes.*, COUNT(c.id) AS comments_count
            FROM recipes
            LEFT JOIN comments c ON recipes.id = c.recipe_id
            JOIN recipes_has_ingredients rhi ON recipes.id = rhi.recipe_id
            WHERE rhi.ingredient_id = :ingredientId
            GROUP BY recipes.id
            ORDER BY recipes.created_at DESC;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':ingredientId', $ingredientId, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function search(PDO $conn, string $query)
{
    $sql = "SELECT recipes.*, COUNT(c.id) AS comments_count
            FROM recipes
            LEFT JOIN comments c ON recipes.id = c.recipe_id
            WHERE recipes.name LIKE :query
               OR recipes.description LIKE :query
            GROUP BY recipes.id
            ORDER BY recipes.created_at DESC;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':query', '%' . $query . '%', PDO::PARAM_STR);
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
