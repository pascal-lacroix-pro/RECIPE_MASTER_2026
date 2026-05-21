<?php
// Si on a un ?recipes=xxx
// On charge le router ./app/routers/recipes.php
if (isset($_GET['recipes'])):
    include_once '../app/routers/recipes.php';

// ROUTE PAR DÉFAUT
// PATTERN: /
// CTRL: pagesController (composite)
// ACTION: home
else:
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($conn);
endif;
