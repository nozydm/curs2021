<?php
session_start();
$usu = 'angelestevez@gmail.com';
$contra = 'angel123';
setcookie ('usuario', sha1(md5($usu)), time() + 365 * 24 * 60 * 60);
setcookie ('contraseña', sha1(md5($contra)), time() + 365 * 24 * 60 * 60);
$_SESSION["usuario"]=$_REQUEST["usuario"];
$_SESSION["contraseña"]=$_REQUEST["contraseña"];
if ($_SESSION["usuario"] == ($usu) and ($_SESSION["contraseña"] == ($contra)))  {
    $_SESSION["timeout"] = time();
    print_r ("valor de texto= ". $_REQUEST["usuario"]. '<br>');
    print_r ("valor de texto= ". $_REQUEST["contraseña"]. '<br>');
     print_r ($_SESSION["usuario"]);
     print_r ($_SESSION["contraseña"]);
} else {
    header("Location: ./A4.php");
}
?>