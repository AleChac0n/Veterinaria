
<?php

if($_POST){
    $nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
    $correo=(isset($_POST['correo'])?$_POST['correo']:"");
    $telefono=(isset($_POST['telefono'])?$_POST['telefono']:"");
    
    $stm=$conexion->prepare("INSERT INTO citas(id,nombre,correo,telefono) 
    VALUES(null,:nombre,:correo,:telefono)");
    $stm->bindParam(":nombre",$nombre);
    $stm->bindParam(":correo",$correo);
    $stm->bindParam(":telefono",$telefono);
    $stm->execute();
    
//Aqui se genera la coneccion, Por si es nesesario cambiar 
    header("location:index2.php");//Aqui cambiar nombre de la locacion 
}

?>




<!-- Modal create -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Cita</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post">
      <div class="modal-body">

        <label for="">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="" placeholder="Ingresa nombre">

        <label for="">Correo</label>
        <input type="text" class="form-control" name="correo" value="" placeholder="Ingresa correo">

        <label for="">Telefono</label>
        <input type="text" class="form-control" name="telefono" value="" placeholder="Ingresa telefono">

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>

