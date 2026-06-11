<?php

namespace App\Models\RecipesModel;

use \PDO;

function findOneByRand(PDO $conn): array
{
    $sql = "SELECT *
            FROM v_recipes
            ORDER BY RAND()
            LIMIT 1;";
    $rs = $conn->query($sql);
    return $rs->fetch(PDO::FETCH_ASSOC);
}

function countAll(PDO $conn): int
{
    $rs = $conn->query("SELECT COUNT(*) FROM recipes;");
    return (int)$rs->fetchColumn();
}

function findAll(PDO $conn, int $limit = 9, int $offset = 0)
{
    $sql = "SELECT *
            FROM v_recipes
            ORDER BY created_at DESC
            LIMIT :limit
            OFFSET :offset;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(":limit", $limit, PDO::PARAM_INT);
    $rs->bindValue(":offset", $offset, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findAllPopulars(PDO $conn)
{
    $sql = "SELECT *
            FROM v_recipes
            ORDER BY avg_rating DESC
            LIMIT 3;";
    $rs = $conn->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findAllByUserId(PDO $conn, int $userId)
{
    $sql = "SELECT *
            FROM v_recipes
            WHERE user_id = :userId
            ORDER BY created_at DESC
            LIMIT 3;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':userId', $userId, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findAllByTypeId(PDO $conn, int $typeId)
{
    $sql = "SELECT *
            FROM v_recipes
            WHERE type_id = :typeId
            ORDER BY created_at DESC;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':typeId', $typeId, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findAllByIngredientId(PDO $conn, int $ingredientId)
{
    $sql = "SELECT v_recipes.*
            FROM v_recipes
            JOIN recipes_has_ingredients rhi ON v_recipes.id = rhi.recipe_id
            WHERE rhi.ingredient_id = :ingredientId
            ORDER BY created_at DESC;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':ingredientId', $ingredientId, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function search(PDO $conn, string $query)
{
    $sql = "SELECT *
            FROM v_recipes
            WHERE name LIKE :query
               OR description LIKE :query
            ORDER BY created_at DESC;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':query', '%' . $query . '%', PDO::PARAM_STR);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findOneById(PDO $conn, int $id)
{
    $sql = "SELECT *
            FROM v_recipes
            WHERE id = :id";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(PDO::FETCH_ASSOC);
}
