<?php 
 if($_POST) {
    $nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
    $descripcion=(isset($_POST['descripcion'])?$_POST['descripcion']:"");
    $cantidad=(isset($_POST['cantidad'])?$_POST['cantidad']:"");
    $fecha=(isset($_POST['fecha'])?$_POST['fecha']:"");

    $stm=$conexion->prepare("INSERT INTO productos(id,nombre,descripcion,cantidad,fecha)
    VALUES(null,:nombre,:descripcion,:cantidad,:fecha)");
    $stm->bindParam(":nombre",$nombre);
    $stm->bindParam(":descripcion",$descripcion);
    $stm->bindParam(":cantidad",$cantidad);
    $stm->bindParam(":fecha",$fecha);
    $stm->execute();

    header("location:productos.php");

 }



?>


<!-- Crear -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">agregar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <label for="">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="" placeholder="ingrese nombre">

        <label for="">Descripcion</label>
        <input type="text" class="form-control" name="descripcion" value="" placeholder="ingrese descripcion">

        <label for="">cantidad</label>
        <input type="text" class="form-control" name="cantidad" value="" placeholder="ingrese cantidad">

        <label for="">Fecha</label>
        <input type="date" class="form-control" name="fecha" value="" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
    </div>
  </div>
</div>