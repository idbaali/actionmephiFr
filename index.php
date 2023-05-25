<?php

session_start();
require_once 'admin/function/main-function.php';
require_once 'admin/function/login.func.php';
require_once 'admin/function/home.func.php';

//require_once 'functions/main.php';
require_once 'includes/header.php';


//var_dump($_GET);
$url = '';
if(isset($_GET['url'])){
    $url = explode('/', $_GET['url']);
}
//var_dump($url);

if($url ===''){
    require 'front/pages/home.php';
}elseif($url[0] =='media'){
    require 'front/pages/gallery.php';
} elseif($url[0] ==='nous-contacter'){
    require 'front/pages/contact.php';
} elseif($url[0] ==='nos-projets'){
    require 'front/pages/projet.php';
} elseif($url[0] ==='a-propos'){
    require 'front/pages/propos.php';
}
elseif($url[0] ==='login'){
    require 'pages/login.php';
}
elseif($url[0] ==='logout'){
    require 'back/pages/logout.php';
}
elseif($url[0] ==='admin' && $url[1] =='login'){
    require 'back/pages/login.php';
}
elseif($url[0] ==='admin' && $url[1] =='dashboard'){
    require 'back/pages/dashboard.php';
}
elseif($url[0] ==='admin' && $url[1] =='logout'){
    require 'back/pages/logout.php';
}
elseif($url[0] ==='admin' && $url[1] =='password'){
    require 'back/pages/password.php';
}
elseif($url[0] ==='admin' && $url[1] =='reglages'){
    require 'back/pages/reglages.php';
}
elseif($url[0] ==='admin' && $url[1] =='modification'){
    require 'back/pages/modification.php';
}
else{
    require 'pages/error.php';
}

require_once 'front/pages/creation_site.php';
require_once 'includes/footer.php';
