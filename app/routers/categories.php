<?php

use \App\Controllers\CategoriesController;

include_once '../app/controllers/categoriesController.php';

switch ($_GET['categories']):
    case 'show':
        CategoriesController\showAction($conn, (int)($_GET['id'] ?? 0));
        break;
    default:
        break;
endswitch;
