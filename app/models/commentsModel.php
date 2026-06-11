<?php

namespace App\Models\CommentsModel;

use \PDO;

function findAllByRecipeId(PDO $conn, int $recipeId)
{
    $sql = "SELECT *
            FROM comments
            WHERE recipe_id = :recipeId
            ORDER BY created_at DESC;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':recipeId', $recipeId, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}
