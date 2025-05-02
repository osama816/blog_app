<?php

require_once("config/db.php");
require_once("core/functions.php");
require_once("core/validations.php");

require_once("./views/layouts/header.php");

$page = isset($_GET["page"]) ? $_GET["page"] : 'home';
showMessages();

$inc=[
   'home'=> "./views/home.php",
   'my_posts'=> "./views/my_posts.php",
   'register'=> "./views/auth/register.php",
   'sign-up'=>"./controllers/auth/register_controller.php" ,
   'sign-in'=>"./controllers/auth/login_controllers.php" ,
   'logout'=> "./controllers/auth/logout_controllers.php",
   'login'=>"./views/auth/login.php" ,
   'blogs'=> "./views/blog/index.php",
   'add-blog'=>  "./views/blog/create.php",
   'edit'=>"./views/blog/edit.php" ,
   'store-blog'=>"./controllers/blog/add_controllers.php" ,
   'edit-blog'=>"./controllers/blog/edit_controllers.php" ,
   'delete-blog'=>"./controllers/blog/delete_controllers.php" ,
   'show-blog'=>"./views/blog/show.php" 
];


$file=isset($inc[$page]) ? $inc[$page] :"./views/404-not-found.php";

include($file);



// switch ($page) {
//     case 'home':
//         include "./views/home.php";
//         break;
//     case 'register':
//         include "./views/auth/register.php";
//         break;
//     case 'sign-up':
//         include "./controllers/auth/register_controller.php";
//         break;
//     case 'sign-in':
//         include "./controllers/auth/login_controllers.php";
//         break;
//     case 'logout':
//         include "./controllers/auth/logout_controllers.php";
//         break;
//     case 'login':
//         include "./views/auth/login.php";
//         break;
//     case 'blogs':
//         include "./views/blog/index.php";
//         break;
//     case 'add-blog':
//         include "./views/blog/create.php";
//         break;
//     case 'edit':
//         include "./views/blog/edit.php";
//         break;
//     case 'store-blog':
//         include "./controllers/blog/add_delete_controllers.php";
//         break;
//     case 'show-blog':
//         include "./views/blog/show.php";
//         break;
//     default:
//         include("./views/404-not-found.php");
//         break;
// }


require_once("./views/layouts/footer.php");
