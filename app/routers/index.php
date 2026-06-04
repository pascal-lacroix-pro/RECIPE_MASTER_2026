<?php
// Si on a un ?recipes=xxx
// On charge le router ./app/routers/recipes.php
if (isset($_GET['recipes'])):
    include_once '../app/routers/recipes.php';

// Si on a un ?users=xxx
// On charge le router ./app/routers/users.php
elseif (isset($_GET['users'])):
    include_once '../app/routers/users.php';

// Si on a un ?categories=xxx
// On charge le router ./app/routers/categories.php
elseif (isset($_GET['categories'])):
    include_once '../app/routers/categories.php';

// ROUTE PAR DÉFAUT
// PATTERN: /
// CTRL: pagesController (composite)
// ACTION: home
else:
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($conn);
endif;
