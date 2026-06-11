<?php

use \App\Controllers\IngredientsController;

include_once '../app/controllers/ingredientsController.php';

switch ($_GET['ingredients']):
    case 'show':
        IngredientsController\showAction($conn, (int)($_GET['id'] ?? 0));
        break;
    default:
        break;
endswitch;
