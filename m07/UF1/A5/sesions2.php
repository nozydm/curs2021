<?php
    
    $errornom="";
    $errorpasswd="";
    $error=false;
    session_start();
    
    if (!isset($_SESSION["usuario"]) and !isset($_SESSION["contrasena"])){
        header("location:sesions.php");
    }else{
        echo ("Hola: ".$_SESSION["usuario"]);
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST') {


        include "libreria.php";
        $usuari = $_SESSION["usuario"];
        $uptcontrasena = $_POST["uptcontrasena"];
        #correo electronico correcto
        if(is_valid_email($usuari)== false) {
            $errornom="El usuario debe ser un correo electronico";
            $error=true;
        }
        #contraseña correcta
        if(preg_match ("/^[a-zA-Z0-9]+$/", $uptcontrasena)== false) {
            $errorpasswd="La contraseña deben ser numeros o letras";
            $error=true;
        }
        try{
            $conn = new mysqli('localhost', 'acustodio', 'acustodio', 'acustodio_');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "UPDATE angeltio SET pass='$uptcontrasena' WHERE usuario='$usuari'";
            mysqli_query($conn, $sql);
            header('location: sesions.php');
         }catch(mysqli_sql_exception $e) {
             $e->errorMessage();
         }
    }
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        #panel {background-color: grey; border: 5px; border-style: solid;
        padding: 10px;}
</style>
<body>
<div id="panel">
    <form action="sesions2.php" method="post" id="myform" name="myform">

    <label>UPDATE Contrasena</label> <input type="text" size="30" maxlength="100" name="uptcontrasena" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_REQUEST["uptcontrasena"];?>" required /><span class="errorpasswd"><?=$errorpasswd;?></span><br /><br />

    <button id="mysubmit" type="submit">Update</button><br /><br />

    </form>
        <form action="sesions3.php" method="post" id="myform" name="myform">
        <button id="mysubmit" type="submit">Logout</button><br /><br />
        </form>
</div>
</body>
</html>
