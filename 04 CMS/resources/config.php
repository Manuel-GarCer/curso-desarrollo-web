<?php
    ob_start();

    session_start(); //para que ejecute variables de session universales
    //session_destroy(); //elimina todo el inicio de sesion

    //echo DIRECTORY_SEPARATOR;
    //para definir el DS osea / o \
    //defined es una cons pero en php y es en mayusculas esta
    defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
    //echo DS;

    // CONSTANTES PARA RUTAS RELATIVAS ->  VIEWS (para las vistas) q nuestro index.php sea mas pequeño
    //echo__DIR__; esto nos da una ruta desde disco c hasta resources
    defined("VIEW_FRONT") ? null : define("VIEW_FRONT", __DIR__ . DS . "views" . DS . "front" );
    //define si esta creada la carpeta FRONT y lo definimos la ruta donde DS es(/) y lo concatenamos con punto .  
    defined("VIEW_BACK") ? null : define("VIEW_BACK", __DIR__ . DS . "views" . DS . "back" );
    //echo VIEW_BACK;


    //DEFINIR PARAMETROS DE CONEXION CON CONSTANTES
    //HOST, USER, PASS, DB
    defined("DB_HOST") ? null : define("DB_HOST", "localhost");
    defined("DB_USER") ? null : define("DB_USER", "root");
    defined("DB_PASS") ? null : define("DB_PASS", "");
    defined("DB_NAME") ? null : define("DB_NAME", "agencia");

    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    // if($conexion){
    //     echo "conexion exitosa";
    // }
    mysqli_set_charset($conexion, "utf8");
    //set_charset: establecer juego de caracteres y utf8 son todos los tipos de caracteres para el servidor
    require_once("caller.php");
    //requerir una vez(caller.php)para q los usuarios no cambien nada(por seguridad) ahi estaran todos nuetros controladores a trabajar
?>