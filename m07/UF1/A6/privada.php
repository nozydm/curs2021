<?php

include("contrologin.php");
include("funcions.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
  </head>
  <body>

    <a href="edituser.php?emailc=<?=$_SESSION['login']?>">Edita les teves dades</a>

    <?php

        $bd_user = getUserData($_SESSION["login"]);
        $bd_user_id = $bd_user["id"];
        echo "---->".$bd_user_id."<----";

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
          $producte_nom = test_input($_REQUEST("nom"));
          $producte_categoria = test_input($_REQUEST("categoria"));
          $producte_descripcio = test_input($_REQUEST("descripcio"));
          $producte_preu = test_input($_REQUEST("preu"));
          
          if(isAdmin($_SESSION["login"])){

              $conn = connectDB('localhost', 'acustodio', 'acustodio', 'acustodio_a6');
              $sql = "select * from usuarios  ";
              $resultado = $conn->query($sql);
              if (!$resultado) {
                die("error ejecutando la consulta:".$conn->error);
              }
              
                
                
                while($usuari=$resultado->fetch_assoc()){
                  echo $usuari["nom"].",".$usuari["email"]."<a href=\"edituser.php?emailc=".$usuari["email"]."\">[E]</a><a onclick=\"return confirm('Are you sure?')\" href=\"delete.php?id=".$usuari["id"]."\">[D]</a><br/>";


                }
            
              
            
            




          }
          //SUBIDA DE PRODUCTOS
          $conn = connectDB('localhost', 'acustodio', 'acustodio', 'acustodio_a6');
          $sql = "insert into productes (nom,descripcio,preu) values ('$producte_nom','$producte_descripcio','$producte_preu'";
          if (!$conn->query($sql)) {
            die("error ejecutando la consulta:".$conn->error);
          }
          return true;

         
          

        }

    ?>
      <div id="panel">

          <h3>Pujada de Productes</h3>

          <form action="privada.php" method="post" id="myform" name="myform">
            Nom del producte: <input type="text" name="nom" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_REQUEST["nom"];?>"></input>
            categoria del producte: <select type="text" name="categoria" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_REQUEST["nom"];?>">
              <optgroup label="todas las categorias">
                <?php
                $conn = connectDB('localhost', 'acustodio', 'acustodio', 'acustodio_a6');
                $sql = "SELECT * from categorias";
                if (!$result=$conn->query($sql)){
                  echo "consulta numero 3->".$sql;
                  die("error ".$conn->$error);
                }
                if($result->num_row >=0 ){
                  while($categoria_bd=$result->fetch_assoc() ){
                    $categoria_id = $categoria_bd["id"];
                    $categoria_nom = $categoria_bd["nom"];
                    echo "<option value='$categoria_id'>$categoria_nom</option>";
                  }
                }
                ?>
            </select>
            descripcio del producte: <input type="text" name="descripcio"></input>
            preu del producte: <input type="text" name="preu"></input>
            <button type="submit" name="boton">subir</button>
          </form>

      </div>
  </body>
</html>