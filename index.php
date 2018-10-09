<?php
session_start();
require_once 'LIGA3/LIGA.php';

BD ('localhost', 'root', '', 'SistemasCD');

$where = '';

if(empty($_SESSION['id']) && !empty($_SESSION['Pass'])){
    $where = "where id ='$_SESSION[id]' and Pass '$_SESSION[Pass]'";
}

$usuarios = LIGA ('Usuarios');

if ($usuarios -> numReg() == 1){
    header('sistema.php');
}

HTML :: cabeceras (array ('title' => 'Login para usuarios', 'description' => 'Ingreso Seguro a la página web'));

//HTML (header) (Cuerpo)
//GET -> Datos se envian por la URL     POST -> En el cuerpo de la peticion
//<p> <img /> <br /> <em> </em> <strong> </strong> </p>

$campos = array ('Username'=>'<input id="Username" name="id" />', 'Contraseña'=>'<input type="password" id="Contraseña" name="Pass"/>');

$props =array('form'=>'action="login.php" method="POST"');

if(isset($_GET['error'])){
    echo '<p>Error en Datos';
}

HTML :: forma ($usuarios, 'Login', $campos, $props);

$js = array ('js'=>array('js/jquery-3.3.1.min.js','js/codigo.js'));

HTML::pie($js);

?>