<?php
session_start();

$_SESSION['id']= array();

$_SESSION['Pass']= array();

session_destroy();
header('Location: .');


?>