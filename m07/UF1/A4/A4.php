<?php
    session_start();
    $errornom="";
    $errorpass="";
    $error=false;
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo ("prueba1");
        
        function test_input($data) {
            $data = trim ($data);
            $data = stripslashes ($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        echo ("prueba2");
        function is_valid_email($str){
            return (false !== filter_var($str, FILTER_VALIDATE_EMAIL));
        }
        $user=test_input($_REQUEST["usuario"]);
        $pass=test_input($_REQUEST["contraseña"]);
        $_SESSION["usuario"] = $_REQUEST["usuario"];
        $_SESSION["contraseña"]=$_REQUEST["contraseña"];
        echo ("prueba3");
        if (is_valid_email($user)== false) {
            $errornom="El usuario debe ser un correo electronico";
            $error=true;
            echo ("prueba4");
        }
        if (preg_match ("/^[a-zA-Z0-9]+$/", $pass)== false) {
            $errorpass="La contraseña deben ser numeros o letras";
            $error=true;
            echo ("prueba5");

        }
        if(!$error) {
            header("Location: a4_dades.php");
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
<body>
    <div style="margin: 30px 10%;">
    <h3>LOGIN</h3>
    <form action="a4_dades.php" method="post" id="myform" name="myform">

        <label>Usuario</label> <input type="text" value= "<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_REQUEST["usuario"];?>" size="30" maxlength="100" name="usuario" id="" required /><span class="errornom"><?=$errornom;?></span><br /><br />
        <label>Contraseña</label> <input type="password" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_REQUEST["contraseña"];?>" size="30" maxlength="100" name="contraseña" id=" " required /><span class="errorpass "><?=$errorpass;?></span><br /><br />
        <button id="mysubmit" type="submit">Submit</button><br /><br />

    </form>
    </div>
</body>
</html>