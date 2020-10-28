<?php
$errornom="";
$errorpasswd="";
$error=false;
include "libreria.php";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nouusari = $_REQUEST["nouusuari"];
    $noucontrasena = $_REQUEST["noucontrasena"];
    try{
        $conn = new mysqli('localhost', 'acustodio', 'acustodio', 'acustodio_');
    }catch(mysqli_sql_exception $e) {
        $e->errorMessage();
    }
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
        header("location: sesions.php");
    }
}


?>
<DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Exemple de sesions</title>
</head>

<body>
    <div style="margin: 30px 10%;">

        <h3>Validacion</h3>

        <form action="register.php" method="post" id="myform" name="myform">

            <label>Usuario</label> <input type="text" size="30" maxlength="100" name="nouusuari" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_REQUEST["nouusuari"];?>" required /><span class="errornom"><?=$errornom;?></span><br /><br />

            <label>Contrasena</label> <input type="text" size="30" maxlength="100" name="noucontrasena" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_REQUEST["noucontrasena"];?>" required /><span class="errorpasswd"><?=$errorpasswd;?></span><br /><br />

            <button id="mysubmit" type="submit">Login</button><br /><br />

        </form>

    </div>

</body>
</html>