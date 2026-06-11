<?php

namespace App\Controllers\RecipesController;

use \PDO;
use \App\Models\RecipesModel;

function indexAction(PDO $conn, int $limit = 9)
{
    include_once '../app/models/recipesModel.php';
    $recipes = RecipesModel\findAll($conn, $limit);

    global $content, $title;
    $title = RECIPES_INDEX_TITLE;
    ob_start();
    include '../app/views/recipes/index.php';
    $content = ob_get_clean();
}

function searchAction(PDO $conn, string $query)
{
    include_once '../app/models/recipesModel.php';

    $words = preg_split('/\s+/', trim($query), -1, PREG_SPLIT_NO_EMPTY);
    $results = [];
    foreach ($words as $word) {
        foreach (RecipesModel\search($conn, $word) as $recipe) {
            $results[$recipe['id']] = $recipe;
        }
    }
    $recipes = array_values($results);

    global $content, $title;
    $title = "Recherche : " . htmlspecialchars($query);
    ob_start();
    include '../app/views/recipes/search.php';
    $content = ob_get_clean();
}

function showAction(PDO $conn, int $id)
{
    include_once '../app/models/recipesModel.php';
    $recipe = RecipesModel\findOneById($conn, $id);

    global $content, $title;
    $title = $recipe['name'];
    ob_start();
    include '../app/views/recipes/show.php';
    $content = ob_get_clean();
}
