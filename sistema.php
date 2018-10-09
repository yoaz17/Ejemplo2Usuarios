<?php
session_start();

require_once 'LIGA3/LIGA.php';
 BD('localhost', 'root', ' ', 'sistemascd');
 $tabla = 'usuarios';
 $liga = LIGA($tabla);

if(empty($_SESSION['id']) && !empty($_SESSION['Pass'])){
    //echo 'Usuario OK';
    require_once 'LIGA3/LIGA.php';
    
    HTML::cabeceras(array('title' => 'Sistema Seguro', 'description' => 'Lo que sea...'));
    
    $body = array('contenedor' => array('uno' => '<p>Usuario Válido</p>', 'dos' => '<a href = "cerrar.php"> Cerrar Sesion</a> '));
    
    
    $cols=array('*', '-Pass');
    $join = array('depende' => $liga);
    $pie = '<th colspan="@[numCols]">Total de instancias:@[numReg]</th>';
    HTML::tabla($liga, 'Instancias de' .$tabla, $cols, true, $join, $pie);
    
    
    
    HTML::cuerpo($body);
    HTML::pie();
    
}else{
   // echo 'Area Prohibida';
   header('Location: .?error=1');
}
