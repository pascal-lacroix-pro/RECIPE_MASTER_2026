<?php

namespace App\Controllers\IngredientsController;

use \PDO;
use \App\Models\IngredientsModel;
use \App\Models\RecipesModel;

function showAction(PDO $conn, int $id)
{
    include_once '../app/models/ingredientsModel.php';
    include_once '../app/models/recipesModel.php';

    $ingredient = IngredientsModel\findOneById($conn, $id);
    if (!$ingredient) {
        header('Location: ?');
        exit;
    }
    $recipes = RecipesModel\findAllByIngredientId($conn, $ingredient['id']);

    global $content, $title;
    $title = $ingredient['name'];
    ob_start();
    include '../app/views/ingredients/show.php';
    $content = ob_get_clean();
}
