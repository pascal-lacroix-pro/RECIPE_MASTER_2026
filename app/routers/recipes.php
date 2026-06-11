<?php

use \App\Controllers\RecipesController;

include_once '../app/controllers/recipesController.php';

switch ($_GET['recipes']):
    case 'show':
        RecipesController\showAction($conn, (int)($_GET['id'] ?? 0));
        break;
    case 'search':
        RecipesController\searchAction($conn, $_GET['q'] ?? '');
        break;
    default:
        RecipesController\indexAction($conn, (int)($_GET['page'] ?? 1));
        break;
endswitch;
