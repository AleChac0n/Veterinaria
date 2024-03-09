
<?php
include("conexion.php");

$stm=$conexionPDO->prepare("SELECT * FROM usuarios");
$stm->execute();
$usuarios=$stm->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['id'])){

    $txtid=(isset($_GET['id'])?$_GET['id']:"");
    $stm=$conexionPDO->prepare("DELETE FROM usuarios WHERE id=:txtid");
    $stm->bindParam(":txtid",$txtid);
    $stm->execute();
    header("location:edit_user.php");

}

?>

<?php  ?>




<div class="table-responsive">
    <table class="table ">
        <thead class="table table-light" >
            <tr>
                
                <th scope="col">ID</th>
                <th scope="col">Usuario</th>
                <th scope="col">Rol</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($usuarios as $usuario) { ?>
            <tr class="">
                <td scope="row"> <?php echo $usuario['id']; ?></td>
                <td><?php echo $usuario['user']; ?></td>
                <td><?php echo $usuario['rol']; ?></td>
                <td>
                <a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-success">Editar</a>
                <a href="edit_user.php?id=<?php echo $usuario['id']; ?>" class="btn btn-danger">Eliminar</a>
        </td>
            </tr>
          
            
            <?php } ?>
        </tbody>
    </table>
</div>



 <?php  ?>