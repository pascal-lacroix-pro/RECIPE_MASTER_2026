<?php

use \App\Controllers\RecipesController;

include_once '../app/controllers/recipesController.php';

switch ($_GET['recipes']):
    case 'show':
        RecipesController\showAction($conn, $_GET['id']);
        break;
    case 'search':
        RecipesController\searchAction($conn, $_GET['q'] ?? '');
        break;
    default:
        RecipesController\indexAction($conn);
        break;
endswitch;
