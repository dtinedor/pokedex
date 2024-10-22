<?php 
include("config.bbdd.php");
$conexion=new mysqli($servidor,$usuario,$password,$bbdd);
if ($conexion->connect_errno) {
    printf("Falló la conexión: %s\n", $conexion->connect_error);
    exit();
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>POKEDEX</title>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="ico.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container-fluid p-5 bg-danger text-white text-center">
  <h1>POKEDEX 1.0</h1>
  <p><?php 
  if ($resultado = $conexion->query("SELECT * FROM mispokemon")) {
      printf("Hay un total de  %d Pokemon en tu Pokedex.\n", $resultado->num_rows);
     
  }
  ?>
</div>
  
<div class="container mt-3">
  <h3>Accediendo a base de datos de Pokemon</h3>
      <p></p>       
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Categoria</th>
        <th>Tipo</th>
        <th>Peso</th>
        <th>Altura</th>
        <th>Imagen</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    while($pokemon = $resultado->fetch_assoc()){
        
        echo "<tr>";
            echo "<td><b>"; echo $pokemon['nombre'];  echo "</b></td>";
            echo "<td>"; echo $pokemon['categoria'];  echo "</td>";
            echo "<td>"; echo $pokemon['tipo'];  echo "</td>";
            echo "<td>"; echo $pokemon['peso'];  echo "</td>";
            echo "<td>"; echo $pokemon['altura'];  echo "</td>";
            echo "<td>"; echo '<img height="80" width="80" src="data:image/jpeg;base64,'.base64_encode($pokemon["foto"]).'"/>';echo "</td>";
        
        
        echo "</tr>";
    }
    $resultado->close();
    ?>
    
  
    </tbody>
  </table>
</div>

</body>
</html>
