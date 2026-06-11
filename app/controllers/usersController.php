<?php

namespace App\Controllers\UsersController;

use \PDO;
use \App\Models\UsersModel;
use \App\Models\RecipesModel;

function indexAction(PDO $conn, int $limit = 9)
{
    include_once '../app/models/usersModel.php';
    $users = UsersModel\findAll($conn, $limit);

    global $content, $title;
    $title = USERS_INDEX_TITLE;
    ob_start();
    include '../app/views/users/index.php';
    $content = ob_get_clean();
}

function showAction(PDO $conn, int $id)
{
    include_once '../app/models/usersModel.php';
    include_once '../app/models/recipesModel.php';

    $user = UsersModel\findOneById($conn, $id);
    if (!$user) {
        header('Location: ?users');
        exit;
    }
    $userLatestRecipes = RecipesModel\findAllByUserId($conn, $user['id']);

    global $content, $title;
    $title = $user['name'];
    ob_start();
    include '../app/views/users/show.php';
    $content = ob_get_clean();
}
