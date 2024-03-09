<?php

include("conexion.php");



if(isset($_GET['id'])){

    $txtid=(isset($_GET['id'])?$_GET['id']:"");
    $stm=$conexionPDO->prepare("SELECT * FROM usuarios WHERE id=:txtid");
    $stm->bindParam(":txtid",$txtid);
    $stm->execute();
    $registro=$stm->fetch(PDO::FETCH_LAZY);
    $user=$registro['user'];
    $rol=$registro['rol'];
    // $txtid=$registro['txtid'];
    
}

if($_POST) {
  $txtid=(isset($_POST['txtid'])?$_POST['txtid']:"");
  $user=(isset($_POST['user'])?$_POST['user']:"");
  $rol=(isset($_POST['rol'])?$_POST['rol']:"");


  $stm=$conexionPDO->prepare("UPDATE usuarios SET user=:user,rol=:rol WHERE id=:txtid");
  $stm->bindParam(":user",$user);
  $stm->bindParam(":rol",$rol);
  $stm->bindParam(":txtid",$txtid);
  $stm->execute();

  header("location:edit_user.php");

}


?>
<?php include("templates/header.php"); ?>

<form action="" method="post">

        <input type="hidden" class="form-control" name="txtid" value="<?php echo $txtid; ?>" placeholder="ingrese nombre">
      
        <label for="">user</label>
        <input type="text" class="form-control" name="user" value="<?php echo $user; ?>" placeholder="ingrese usuario">

        <label for="">rol</label>
        <input type="text" class="form-control" name="rol" value="<?php echo $rol; ?>" placeholder="ingrese rol">

      
      </div>

      <div class="modal-footer">
        <a href="edit_user.php" class="btn btn-danger">Cancelar</a>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
    </form>
 