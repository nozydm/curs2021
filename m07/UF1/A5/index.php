<?php
$errornom="";
$errorpasswd="";
$error=false;
include "libreria.php";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nouusari = $_POST["nouusuari"];
    $noucontrasena = $_POST["noucontrasena"];
    #correo electronico correcto
    if(is_valid_email($nouusari)== false) {
        $errornom="El usuario debe ser un correo electronico";
        $error=true;
    }
    #contraseña correcta
    if(preg_match ("/^[a-zA-Z0-9]+$/", $noucontrasena)== false) {
        $errorpasswd="La contraseña deben ser numeros o letras";
        $error=true;
    }
    if($error == false) {
        try{
            $conn = new mysqli('localhost', 'acustodio', 'acustodio', 'acustodio_');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
          
            $sql = "SELECT usuario, pass FROM angeltio";
            $result = $conn->prepare($sql);
            $result->execute();
            $result->bind_result($tusuario, $tpass);
         
            while($result->fetch()) {
                echo "id: $tusuairo - nom: $tpass <br>";
            }
            $result=null;
            $conn->close();
         }catch(mysqli_sql_exception $e) {
             $e->errorMessage();
         }
    }
}
?>