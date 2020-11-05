<?php

    $errornom="";
    $errorpasswd="";
    $error=false;
    $admin = "angel@gmail.com";
    //error_reporting(E_ALL & ~E_NOTICE);

    $correctuser = 'angel@gmail.com';
    $correctpasswd = '123';

    #validacion mediante cookies
    /*esto serviria para guardar las cookies si hago toda la validacion en el archivo y marco el checkbox*/
    if ($_COOKIE["user"] == sha1(md5($correctuser)) and $_COOKIE["passwd"] == sha1(md5($correctpasswd))) {
        header("Location: sesions2.php");
    }

    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        include "libreria.php";
        session_start();

        #validacion de usuario correcto
        

        

        $conn = new mysqli('localhost', 'acustodio', 'acustodio', 'acustodio_');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        
        $user=test_input($_REQUEST["usuari"]);
        $passwd=test_input($_REQUEST["contrasena"]);
        
        $query = "SELECT * FROM angeltio where usuario='$user' and pass='$passwd'";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $resultado = mysqli_num_rows($result);


        if (!$result = $conn->query($query)) {
            die("error con la consulta".$conn->error);
        }
        #si la validacion de contrasena y usuario es correcta:
        else if ($resultado == 1){
            
            $_SESSION["usuario"]=$_REQUEST["usuari"];
            $_SESSION["contrasena"]=$_REQUEST["contrasena"];

            if(isset($_REQUEST["checkbox"])){
    
                setcookie('user', sha1(md5($correctuser)), time() + 365 * 24 * 60 * 60);    
                setcookie('passwd', sha1(md5($correctpasswd)), time() + 365 * 24 * 60 * 60);
                
            }
            
            header("Location: sesions2.php");
        
            
        }else {

            #correo electronico correcto
            if(is_valid_email($user)== false) {
                $errornom="El usuario debe ser un correo electronico";
                $error=true;
            }
            #contraseña correcta
            if(preg_match ("/^[a-zA-Z0-9]+$/", $passwd)== false) {
                $errorpasswd="La contraseña deben ser numeros o letras";
                $error=true;
            }
        }
    }
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

        <title>Exemple de sesions</title>
    </head>

    <body>
        <div style="margin: 30px 10%;">

            <h3>Validacion</h3>

            <form action="sesions.php" method="post" id="myform" name="myform">

                <label>Usuario</label> <input type="text" size="30" maxlength="100" name="usuari" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_REQUEST["usuari"];?>" required /><span class="errornom"><?=$errornom;?></span><br /><br />

                <label>Contrasena</label> <input type="text" size="30" maxlength="100" name="contrasena" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_REQUEST["contrasena"];?>" required /><span class="errorpasswd"><?=$errorpasswd;?></span><br /><br />

                <input type="checkbox" name="checkbox" value="1" /> Mantener sesion iniciada<br /><br />

                <button id="mysubmit" type="submit">Login</button><br /><br />

            </form>
            <form action="register.php">
            <button>Reg</button>
            </form>

        </div>

    </body>
</html>