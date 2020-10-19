<?php


    session_start();

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

        <label>Usuario</label> <input type="text" value="" size="30" maxlength="100" name="usuario" id="" /><br /><br />
        <label>Contraseña</label> <input type="text" value="" size="30" maxlength="100" name="contraseña" id="" /><br /><br />
        <button id="mysubmit" type="submit">Submit</button><br /><br />

    </form>
    </div>
</body>
</html>