<?php
session_start();
require_once 'LIGA3/LIGA.php';

BD ('localhost', 'root', '', 'SistemasCD');

$usuarios = LIGA ("select * from usuarios where id= '$_POST[id]' and Pass = md5('$_POST[Pass]')");

if ($usuarios ->numReg() == 1){
    //echo 'Si es !!';
    $_SESSION['id'] = $usuarios->d('id');
    $_SESSION['Pass'] = $usuarios->d('Pass');
    //header('Location: sistema.php');
    echo 'Usuario Válido';
    
}else{
  
    //header('Location: index.php?error=1');
echo 'Error en los Datos';
//echo 'No es :(';    

}

