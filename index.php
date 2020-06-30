<?php 
    define("BASE_URL","http://localhost/sa/campus_estudiantine");//
   // define("BASE_URL","/campus");
    require_once('./libs/Router.php');
    $router= new Router();
    $router->route();