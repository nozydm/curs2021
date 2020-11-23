<?php
session_start();
include("funcions.php");
$producte_id = test_input($_REQUEST["id"]);
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  //COMPRA DE PRODUCTOS
  $conn = connectDB('localhost', 'acustodio', 'acustodio', 'acustodio_a6');
  $sql = "select * from productes where id=$producte_id";
  if (!$conn->query($sql)) {
    die("error ejecutando la consulta:".$conn->error);
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
    <div id="productos">
      <?php
        //PRINTEAR PRODUCTOS
        $conn = connectDB('localhost', 'acustodio', 'acustodio', 'acustodio_a6');
        $sql = "select * from productes";
        
        if (!$resultado=$conn->query($sql)) {
          die("error ejecutando la consulta:".$conn->error);
        }else{
          while($lista_productes = $resultado->fetch_assoc()){

            echo $lista_productes['id'];
            echo "-";
            echo $lista_productes['nom'];
            echo "-";
            echo $lista_productes['descripcio'];
            echo "-";
            echo $lista_productes['preu'];
            echo "<br>";
            echo "</br>";
          }
        }
      ?>
    </div>
      <form action="privadacompra.php" method="post">
      id del producte: <input type="text" name="id"></input>
      <button type="submit" name="boton">Añadir</button>
      </form>
    <div id="carrito">
    <a href="carrito.php">VER CARRITO</a>
    </div>
</body>
</html>