<?php
session_start();

if(empty($_SESSION['id']) && !empty($_SESSION['Pass'])){
    //echo 'Usuario OK';
    require_once 'LIGA3/LIGA.php';
    
    HTML::cabeceras(array('title' => 'Sistema Seguro', 'description' => 'Lo que sea...'));
    
    $body = array('contenedor' => array('uno' => '<p>Usuario Válido</p>', 'dos' => '<a href = "cerrar.php"> Cerrar Sesion</a> '));
    HTML::cuerpo($body);
    HTML::pie();
    
}else{
   // echo 'Area Prohibida';
   header('Location: .?error=1');
}