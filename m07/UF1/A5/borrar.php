<?php
    
    $errornom="";
    $errorpasswd="";
    $error=false;
    session_start();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {


        include "libreria.php";
        $usuari = $_SESSION["usuario"];
        $borrarusuario = $_POST["borrarusuario"];
        #correo electronico correcto
        if(is_valid_email($borrarusuario)== false) {
            $errornom="El usuario debe ser un correo electronico";
            $error=true;
        }
        #contraseña correcta
        if(preg_match ("/^[a-zA-Z0-9]+$/", $borrarusuario)== false) {
            $errorpasswd="La contraseña deben ser numeros o letras";
            $error=true;
        }
        try{
            $conn = new mysqli('localhost', 'acustodio', 'acustodio', 'acustodio_');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "DELETE FROM angeltio WHERE usuario='$borrarusuario';";
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
    <form action="borrar.php" method="post" id="myform" name="myform">

    <label>Usuario que quieres borrar</label> <input type="text" size="30" maxlength="100" name="borrarusuario" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_REQUEST["borrarusuario"];?>" required /><span class="errorpasswd"><?=$errorpasswd;?></span><br /><br />

    <button id="mysubmit" type="submit">borrar</button><br /><br />
</div>
</body>
</html>
