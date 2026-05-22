<?php
session_start();
if(!isset($_SESSION)){
    header("Location: ../Sesion/Login.php");
    exit();
}
//Borrar session
$_SESSION = array();
if(isset($COOKIE[session_name()])){
    setcookie(session_name(),'',time() - 42000);

    session_destroy();
}
header("Location: Login.php");
exit();
?>