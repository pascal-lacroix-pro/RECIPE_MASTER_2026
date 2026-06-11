<?php

namespace App\Controllers\CategoriesController;

use \PDO;
use \App\Models\CategoriesModel;
use \App\Models\RecipesModel;

function showAction(PDO $conn, int $id)
{
    include_once '../app/models/categoriesModel.php';
    include_once '../app/models/recipesModel.php';

    $category = CategoriesModel\findOneById($conn, $id);
    if (!$category) {
        header('Location: ?');
        exit;
    }
    $recipes = RecipesModel\findAllByTypeId($conn, $category['id']);

    global $content, $title;
    $title = $category['name'];
    ob_start();
    include '../app/views/categories/show.php';
    $content = ob_get_clean();
}
