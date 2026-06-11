<?php

use \App\Controllers\UsersController;

include_once '../app/controllers/usersController.php';

switch ($_GET['users']):
    case 'show':
        UsersController\showAction($conn, (int)($_GET['id'] ?? 0));
        break;
    default:
        UsersController\indexAction($conn);
        break;
endswitch;
