<?php

require_once("config/db.php");
require_once("core/functions.php");
require_once("core/validations.php");

require_once("./views/layouts/header.php");

$page = isset($_GET["page"]) ? $_GET["page"] : 'home';
showMessages();

switch ($page) {
    case 'home':
        include "./views/home.php";
        break;
    case 'register':
        include "./views/auth/register.php";
        break;
    case 'sign-up':
        include "./controllers/auth/register_controller.php";
        break;
    case 'sign-in':
        include "./controllers/auth/login_controllers.php";
        break;
    case 'logout':
        include "./controllers/auth/logout_controllers.php";
        break;
    case 'login':
        include "./views/auth/login.php";
        break;

    default:
        include("./views/404-not-found.php");
        break;
}


require_once("./views/layouts/footer.php");
