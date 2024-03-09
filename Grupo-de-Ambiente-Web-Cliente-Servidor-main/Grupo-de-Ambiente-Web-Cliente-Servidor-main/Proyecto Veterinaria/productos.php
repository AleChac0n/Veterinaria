<?php

include("conexion.php");


$stm=$conexion->prepare("SELECT * FROM productos");
$stm->execute();
// $productos=$stm->fetchAll(PDO::FETCH_ASSOC);


if(isset($_GET['id'])){

    $txtid=(isset($_GET['id'])?$_GET['id']:"");
    $stm=$conexion->prepare("DELETE FROM productos where id=txtid");
    $stm->bindParam(":txtid",$txtid);
    $stm->execute();
    agregarP("location:productos.php");

}
?>


<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

  <header>
    <!-- place navbar here -->
  </header>

  <main class="container">
    <br><br><br>


    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
  Nuevo
</button>

  <div class="table-responsive">
    <table class="table ">
        <thead class="table table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th>cantidad</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($productos as $producto) { ?>
            <tr class="">
                <td scope="row"><?php echo $producto['id']; ?></td>
                <td><?php echo $producto['nombre'];?></td>
                <td><?php echo $producto['descripcion'];?></td>
                <td><?php echo $producto['cantidad'];?></td>
                <td><?php echo $producto['fecha'];?></td>
                <td><a href="edit.php?id=<?php echo $producto['id']; ?>" class="btn btn-success"> Editar</a>
                <a href="productos.php?id=<?php echo $producto['id']; ?>" class="btn btn-danger"> Eliminar</a>
            </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php include("agregarP.php"); ?>
  

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

 <!-- funcion boton agregar-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>